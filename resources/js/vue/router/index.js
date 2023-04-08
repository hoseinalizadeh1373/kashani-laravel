import { createWebHistory, routerKey, useRoute } from 'vue-router'
import createRouter from './routes.js'
import { useAuthStore } from '../store/auth.js';
import { useOptionsStore } from '../store/options';
import { useAppProgressStore } from '../store/appProgress.js';

let router = createRouter(createWebHistory());


axios.interceptors.response.use(response => response, err => {
    // const status = get(err, 'response.status')

  /*   if (err.response.status == 401) {
        const auth = useAuthStore();
        auth.logoutAndShowLoginForm();
    }
 */
    return Promise.reject(err)

})



router.beforeEach(async (to, from, next) => {

    
    const appProgress = useAppProgressStore();
    appProgress.start();

    const auth = useAuthStore();
    const options = useOptionsStore();

    try {
        if (auth.access_token !== null && !auth.isLogedIn)
            await auth.fetchUser();
    }
    catch (err) {
        console.log(err)
    }


    if (to.meta.requireAuth && !auth.isLogedIn) {
        auth.setIntendedUrl(to.fullPath)
        auth.showLoginForm()
        return next(false)
    }

    if (to.meta.level == "admin" && !auth.isAdmin) {
        return next({ name: "forbidden" });
    }


    return next();

})


router.afterEach(async (to, from, next) => {
    
    const appProgress = useAppProgressStore();
    appProgress.stop();

})


export default router;