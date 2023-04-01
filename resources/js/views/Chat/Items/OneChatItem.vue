<template>
    <router-link :to="{name: 'chat.show', params: {'id': chat.id}}">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>{{ chat.name }}</h3>
                        <span><i class="fas fa-cog"></i></span>
                    </div>
                    <div class="card-body">
                        <p class="card-text" v-if="!loading">{{ lastMessage || 'No messages yet' }}</p>
                        <div v-else class="card-text">
                            <div class="spinner-border" role="status">
                                <span class="sr-only"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </router-link>
</template>
<script>
import axios from 'axios';

export default {
    props: ['chat'],
    name: 'OneChatItem',
    data() {
        return {
            messages: [],
            loading: true,
        };
    },
    mounted() {
        this.getMessages();
    },
    methods: {
        async getMessages() {
            try {
                const response = await axios.get(`/api/chats/${this.chat.id}`);
                this.messages = response.data.messages;
            } catch (error) {
                console.log(error);
            } finally {
                this.loading = false;
            }
        },
    },
    computed: {
        lastMessage() {
            return this.messages.length ? this.messages[this.messages.length - 1].body : '';
        },
    },
};
</script>
<style scoped></style>
