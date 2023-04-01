<template>
    <div>
        <!-- Отображение названия чата -->
        <h1>{{ name }}</h1>

        <!-- Блок для каждого сообщения -->
        <div v-for="(message, index) in messages" :key="index" class="card mb-3">
            <div class="card-body">
                <!-- Тело сообщения -->
                <p class="card-text">{{ message.body }}</p>
                <!-- Дата создания сообщения -->
                <p class="card-text"><small class="text-muted">{{ message.created_at }}</small></p>
            </div>
        </div>
    </div>
<!-- Отправить сообщение -->
    <div class="input-group fixed-bottom mt-auto w-75 mx-auto mb-5">
        <input type="text" class="form-control" placeholder="Написать сообщение" v-model="userMessage">
        <button class="btn btn-primary" type="button" @click.prevent="sendMessage()"><i class="fa fa-paper-plane"></i></button>
    </div>


</template>

<script>
export default {
    name: "ChatDetails",
    data() {
        return {
            chat: [],
            messages: [],
            userMessage: null,
        }
    },
    mounted() {
        this.getChat()
    },
    methods: {
        getChat() {
            axios.get(`/api/chats/${this.id}`)
                .then(response => {
                    this.chat = response.data.chat;
                    this.messages = response.data.messages;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        sendMessage() {
            axios.post(`/api/chats/${this.id}/messages`, {
                body: this.userMessage,
                chat_id: this.chat.id,
                user_id: 1
            }).then(response => {
                this.userMessage = null;
                this.getChat();
            })
        }
    },
    computed: {
        id() {
            return this.$route.params.id
        },
        name() {
            return this.chat.name
                ? this.chat.name
                : "loading..."
        },
        image_url() {
            return this.chat.image_url ?
                this.chat.image_url
                : "loading..."
        }
    },
}
</script>

<style scoped>

</style>
