<template>
    <div>
        <div v-if="loading">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>

        <div v-else-if="error">
            <p>Something went wrong. Please try again later.</p>
        </div>

        <div v-else-if="chats.length > 0">
            <div v-for="chat in chats" :key="chat.id">
                <ChatItem :chat="chat" />
            </div>
        </div>

        <div v-else>
            <h1 class="justify-content-center">Nothing to show!</h1>
        </div>
    </div>
<!--    specifically -->
</template>

<script>
import ChatItem from "./Items/OneChatItem.vue";

export default {
    name: "ChatList",
    mounted() {
        this.getChats();
    },
    data() {
        return {
            chats: [],
            messages: [],
            loading: true,
            error: null
        };
    },
    methods: {
        getChats() {
            axios
                .get("/api/chats")
                .then((response) => {
                    this.chats = response.data;
                    this.loading = false;
                })
                .catch((error) => {
                    console.error(error);
                    this.loading = false;
                    this.error = error;
                });
        }
    },
    components: {
        ChatItem
    }
};
</script>
<style scoped>
</style>
