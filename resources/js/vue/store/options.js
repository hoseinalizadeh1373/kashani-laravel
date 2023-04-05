import axios from 'axios'
import { defineStore } from 'pinia'
import { ref, computed } from 'vue';

export const useOptionsStore = defineStore('options', () => {

    // states
    const
        storedOptions = ref(null)

    // getters
    const
        options = computed(() => storedOptions.value ?? {}),
        optionsLoaded = computed(() => storedOptions.value !== null);

    //actions
    async function getOptionsFromServer() {
        const { data } = await axios.get("/api/options")
        storedOptions.value = data
    }

    async function update(options){
        await axios.put("/api/options",options);
        storedOptions.value= JSON.parse(JSON.stringify(options))
    }


    function get(key,def){
        console.log(options)
        return options.value[key] ?? def;    
    }

    return {
        options,
        optionsLoaded,
        get,
        update,
        getOptionsFromServer
    }
})