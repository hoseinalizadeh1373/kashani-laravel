import axios from 'axios'
import { defineStore } from 'pinia'
import { ref, computed } from 'vue';

export const useUsersStore = defineStore('users', () => {

    // states
    const
        storedUsers = ref([]),
        onLoading = ref(false);

    // getters
    const
        users = computed(() => {
            if (storedUsers.value.length < 1)
                getUsersFromServer();
            return storedUsers.value;
        }),
        loading = computed(() => onLoading.value);

    //actions
    async function getUsersFromServer() {
        onLoading.value = true;
        const { data } = await axios.get("/api/users")
        storedUsers.value = data.data
        onLoading.value = false;
    }

    return {
        users,
        loading,
        
        getUsersFromServer,
    }
})