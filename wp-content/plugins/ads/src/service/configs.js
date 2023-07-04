import axios from "../lib/axios";
import { toast } from "vue3-toastify";
import { ACTION_GET_CONFIGS, ACTION_SAVE_CONFIGS } from "../const/actions";
const getConfigs = async (configs, loading) => {
    loading.value = true;
    const response = await axios
        .get(`admin-ajax.php?action=${ACTION_GET_CONFIGS}`);
    const { data } = response;
    if (data.success) {
        const { result } = data;
        configs.address = result.address;
        configs.email = result.email;
        configs.hotline = result.hotline;
        configs.phone = result.phone;
        configs.zalo = result.zalo;
        configs.website = result.website;
        configs.fanpage = result.fanpage;
        configs.slogan = result.slogan;
        configs.iframe = result.iframe;
        configs.google_analytics = result.google_analytics;
        configs.google_mastertool = result.google_mastertool;
        configs.head_js = result.head_js;
        configs.body_js = result.body_js;
        loading.value = false;
    }
    return true;
}
const saveConfigs = async (configs, loading) => {
    loading.value = true;
    const formData = new FormData();
    formData.append("configs[address]", configs.address);
    formData.append("configs[email]", configs.email);
    formData.append("configs[hotline]", configs.hotline);
    formData.append("configs[phone]", configs.phone);
    formData.append("configs[zalo]", configs.zalo);
    formData.append("configs[website]", configs.website);
    formData.append("configs[fanpage]", configs.fanpage);
    formData.append("configs[slogan]", configs.slogan);
    formData.append("configs[iframe]", configs.iframe);
    formData.append("configs[google_analytics]", configs.google_analytics);
    formData.append("configs[google_mastertool]", configs.google_mastertool);
    formData.append("configs[head_js]", configs.head_js);
    formData.append("configs[body_js]", configs.body_js);
    formData.append("action", ACTION_SAVE_CONFIGS);
    await axios
        .post("admin-ajax.php", formData)
        .then((res) => {
            const { data } = res;
            if (data.success) {
                toast("Update configs successfully !", {
                    autoClose: 1000,
                    position: 'bottom-right',
                    type: 'success'
                });
            } else {
                toast("Update data wrong !", {
                    autoClose: 1000,
                    position: 'bottom-right',
                    type: 'error'
                });
            }
        })
        .catch((err) => {
            toast("Update data wrong !", {
                autoClose: 1000,
                position: 'bottom-right',
                type: 'error'
            });
        }).finally(() => {
            loading.value = false;
        });
}
export { getConfigs, saveConfigs };