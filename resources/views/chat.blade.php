<html>
<body>
    <div id="chat">
        <textarea v-model="comment_message"></textarea>
        <br>
        <button type="button" @click="send()">送信</button>
    </div>
    <div v-for="m in messages">

    <!-- 登録された日時 -->
    <span v-text="m.created_at"></span>：&nbsp;

    <!-- メッセージ内容 -->
    <span v-text="m.body"></span>

</div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script>

        new Vue({
            el: '#chat',
            data: {
                comment_message: '',
                comment_messages: []
            },
            methods: {
                getComment_messages(){
                    const url = '/ajax/chat';
                    axios.get(url)
                        .then((response) => {

                this.comment_messages = response.data;

                }
                send() {

                    const url = 'ajax/chat';
                    const params = { comment_message: this.comment_message };
                    axios.post(url, params)
                        .then((response) => {

                            // 成功したらメッセージをクリア
                            this.comment_message = '';

                        });
                }
                mounted() {

                this.getMessages();

                    }

        });

    </script>


</body>
</html>
