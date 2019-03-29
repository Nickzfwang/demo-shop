<template>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        開始聊天！
      </div>
      <div class="card-body">
        <div class="list-messages" v-if='messages && messages.length'>
          <div class="media" v-for='message in messages' :key='message.id'>
            <div class="media-body">
              <p>
                <span style="color:blue;"><strong>{{ message.username }}</strong> : </span>
                {{ message.message }}
              </p>
            </div>
          </div>
        </div>
        <div class="messages-not-found" v-else>目前無任何聊天訊息！</div>
      </div>
      <div class="card-footer">
        <div style="display:flex;" class="form-group">
          <input type="text" class="form-control" placeholder="輸入訊息" v-model='message' @keyup.enter='sendMesaage'>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        messages: [],
        message: '',
        name: $('.dropdown .dropdown-toggle').text()
      }
    },
    sockets: {
      connect: function () {
        console.log('Socket Connected')
      },
      // 監聽 Redis Socket io channel
      chat: function (val) {
        this.getMessage()
      }
    },
    methods: {
      sendMesaage() {
        axios.post('/api/post/publish', {
          username: this.name,
          message: this.message
        })
        .then(response => {
          // 發送訊息
        })
        this.messages.push()
        this.message = ''
      },
      getMessage() {
        axios.get('/api/get/publish')
        .then(response => {
          this.messages = response.data
        })
      }
    },
    mounted() {
      this.getMessage();
    }
  }
</script>
