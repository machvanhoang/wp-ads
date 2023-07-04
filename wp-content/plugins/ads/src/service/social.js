import axios from "../lib/axios";
import { toast } from "vue3-toastify";
import { ACTION_GET_SOCIAL, ACTION_SAVE_SOCIAL } from "../const/actions";
const getSocial = async (facebook, instagram, twitter, youtube, loading) => {
    loading.value = true;
    const response = await axios
        .get(`admin-ajax.php?action=${ACTION_GET_SOCIAL}`);
    const { data } = response;
    if (data.success) {
        const { result } = data;
        facebook.value = result.facebook;
        instagram.value = result.instagram;
        twitter.value = result.twitter;
        youtube.value = result.youtube;
        loading.value = false;
    }
    return true;
}
const saveSocial = async (facebook, instagram, twitter, youtube, loading) => {
    loading.value = true;
    const formDATA = new FormData();
    formDATA.append("facebook", facebook.value);
    formDATA.append("instagram", instagram.value);
    formDATA.append("twitter", twitter.value);
    formDATA.append("youtube", youtube.value);
    formDATA.append("action", ACTION_SAVE_SOCIAL);
    await axios
        .post("admin-ajax.php", formDATA)
        .then((res) => {
            const { data } = res;
            if (data.success) {
                toast("Update social successfully !", {
                    autoClose: 1000,
                    position: 'bottom-right',
                    type: 'success'
                });
            } else {
                toast("Update social wrong !", {
                    autoClose: 1000,
                    position: 'bottom-right',
                    type: 'error'
                });
            }
        })
        .catch((err) => {
            toast("Update social wrong !", {
                autoClose: 1000,
                position: 'bottom-right',
                type: 'error'
            });
        }).finally(() => {
            loading.value = false;
        });
}
export { getSocial, saveSocial };