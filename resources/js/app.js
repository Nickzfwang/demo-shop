import './bootstrap'
import Vue from 'vue'
import VueSocketio from 'vue-socket.io'
import Socketio from 'socket.io-client'
import Chat from './components/Chat.vue'

Vue.use(VueSocketio, Socketio(':3064'));

const app = new Vue({
    el: '#app',
    components: { Chat }
})
