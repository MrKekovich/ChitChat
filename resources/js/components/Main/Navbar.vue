<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Стрелочка на главную страницу -->
            <router-link :to="{name: 'chat.index'}" class="navbar-brand"><i class="fa fa-chevron-left"></i></router-link>

            <!-- Название чата и картинка -->
            <div class="navbar-text mx-auto">
<!--                <img :src="image_url" class="mr-2" alt="" width="30" height="30">-->
                {{ title || "ChitChat!" }}
            </div>

            <!-- Меню настроек -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown position-static">
                    <a class="nav-link dropdown-toggle dropdown-toggle-end" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <router-link :to="{name: 'chat.create'}" class="dropdown-item">Add+</router-link>
                        </li>
                        <li>
                            <router-link to="#" class="dropdown-item">Settings</router-link>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <router-link to="#" class="dropdown-item">Leave</router-link>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Navbar",
    props: {
        title: {
            type: String,
            default: "ChitChat!"
        },
        image_url: {
            type: String,
            default: ""
        }
    },
}
</script>

<style scoped>

</style>
