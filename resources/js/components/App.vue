<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <navbar-component class="mb-5"></navbar-component>
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import NavbarComponent from "./Main/Navbar.vue";

export default {
    name: "App",
    data() {
        return {
        }
    },
    mounted() {
        console.log('Index mounted.')
    },
    components: {
        NavbarComponent
    },
}
</script>
