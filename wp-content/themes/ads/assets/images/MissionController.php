<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\CheckDeleteMissionUser;
use App\Repositories\MissionRepository;
use App\Repositories\MissionUserRepository;
use App\Services\Constant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    private $missionRepository;

    private $missionUserRepository;

    public function __construct(
        MissionRepository $missionRepository,
        MissionUserRepository $missionUserRepository
    ) {
        $this->missionRepository = $missionRepository;
        $this->missionUserRepository = $missionUserRepository;
    }

    public function getTimeOnSite(Request $request)
    {
        $hostname = $request->hostname;
        $mission = $this->missionRepository->findOneBy(['hostname' => $hostname]);
        if (is_null($mission) || $mission->status == Constant::INACTIVE_STATUS) {
            return response()->json([
                'success' => false,
                'message' => 'Site url is not available!'
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => [
                'timeOnSite' => $mission->time_on_site,
                'type' => $mission->type
            ]
        ]);
    }

    public function getMissionCodeNoSession(Request $request, $token)
    {
        try {
            $hostname = $request->hostname;
            // Validate hashCode
            $md5HashPHP = md5($hostname . now()->format('H'));
            if ($token !== $md5HashPHP) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed!'
                ]);
            }

            $mission = $this->missionRepository->findOneBy(['hostname' => $hostname]);
            if (is_null($mission) || $mission->status == Constant::INACTIVE_STATUS) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed!'
                ]);
            }
            // Generate random string for mission code with 8 characters.
            $missionCode = '';
            while (true) {
                $missionCode = Str::random(8);
                if (is_null($this->missionUserRepository->findOneBy(['mission_code' => $missionCode, 'status' => Constant::MISSION_USER_WAITING_STATUS]))) {
                    break;
                }
            }
            // Check IP.
            $clientSite = $request->headers->get('referer');
            $clientSite = rtrim($clientSite, '/');
            if (is_null($clientSite) || !in_array($clientSite, config('cors.allowed_origins'))) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed!'
                ]);
            }
            // $details = json_decode(file_get_contents("http://ip-api.com/json/" . $clientIP ));
            // if (!empty($details) && $details->status == 'success') {
            //     //And for the country
            //     $countryCode = $details->countryCode;
            //     //If continent is Europe
            //     if ($countryCode != "VN" && $clientIP != '::1') {
            //         return response()->json([
            //             'success' => false,
            //             'message' => 'Failed!'
            //         ]);
            //     }
            // }

            $missionUser = $this->missionUserRepository->create([
                'mission_id' => $mission->id,
                'mission_code' => $missionCode,
                'status' => Constant::MISSION_USER_WAITING_STATUS,
            ]);
            // Auto delete this mission if time over 2 minutes.
            $job = (new CheckDeleteMissionUser($missionUser->id))->delay(now()->addMinutes(1));
            dispatch($job);

            // encrypt missionCode
            $missionCode = Str::random(18) . $missionCode . Str::random(20);
            return response()->json([
                'success' => true,
                'data' => $missionCode
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                // 'message' => $e->getMessage()
            ]);
        }
    }
}
