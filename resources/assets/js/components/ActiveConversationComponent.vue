<template>
    <b-row>
        <b-col cols="8">
            <b-card 
                    footer-bg-variant="light"
                    footer-border-variant="dark"
                    title="Conversación activa"
                    class="h-100">

                   <message-conversation-component 
                        v-for="message in messages"
                        :key = "message.id"
                        :writtenByMe = "message.written_by_me" >
                      {{ message.content }}
                    </message-conversation-component>
                    <div slot="footer" >
                        <b-form class="mb-0" @submit.prevent="postMessage" autocomplete="off">
                            <b-input-group>
                                <b-form-input 
                                        type="text" 
                                        v-model="newMessage"
                                        placeholder="Escribe un mensaje.."
                                        class="text-center">
                                </b-form-input>

                                <b-input-group-append>
                                    <b-btn type="submit" variant="primary">Enviar</b-btn>
                                </b-input-group-append>
                            </b-input-group>
                        </b-form>
                    </div>
            </b-card>
        </b-col>
        <b-col cols="4">
            <b-img rounded="circle" blank width="60" height="60" blank-color="#777" alt="img" class="m-1" />
            <p>Usuario seleccionado</p>
            <hr>
            <b-form-checkbox>
                Desactivar notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>

<script>
    export default {
        
        data(){ 
            return {
                messages: [],
                newMessage: '',
                contactId: 2
            }
        },
        
        mounted() {
            // console.log('Component mounted.')
           this.getMessages();
           
        },
        methods: {
            getMessages(){
                axios.get(`api/messages?contact_id=${this.contactId}`)
                .then(response => {
                    console.log(response.data)
                    this.messages = response.data
                })
            },
            postMessage(){
                const params = {
                    to_id: 2,
                    content: this.newMessage
                };
                axios.post('api/messages',params)
                .then((response) => {
                   if(response.data.success){
                        this.newMessage = '';
                        this.getMessages();
                   }
                    
                })
            }
         
            
        }
    }
</script>