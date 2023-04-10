import { defineStore } from 'pinia'
import { ref, computed } from 'vue';

export const useAppProgressStore = defineStore('appProgress', () => {

    // states
    const
        loadingState = ref(false)

    // getters
    const
        loading = computed(() => loadingState.value)


    function start(){
        loadingState.value = true;    
    }

    function stop(){
        loadingState.value = false;    
    }

    return {
       loading,
       start,
       stop,
    }
})