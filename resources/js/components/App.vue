<template>
    <div class="app">
        <MainMenu class="menu-area"></MainMenu>
        <div class="content">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import MainMenu from './menu/MainMenu';
export default {
    name: "App",
    components: {
        MainMenu
    }
}
</script>

<style scoped>
.app {
    margin: 0px;
    display: grid;
    grid-template-columns: 15% 1fr;
    grid-template-rows: 30%;
    grid-template-areas: "menu content";
    height: 350vh;
    background-color: #F5F5F5;
}

.content {
    grid-area: content;
    margin-left: 10px;
}

.menu-area {
    grid-area: menu;
    margin: -10px 10px 0px -10px;
}

</style>
