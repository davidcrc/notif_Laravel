<template>
    <li class="dropdown" >
        <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  href="#" >          
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
</svg>
            <span class="badge" v-if="notifications.length" v-text="notifications.length" ></span>
            
        </a>

        <div class="dropdown-menu" v-if="notifications.length" >
            <!-- <li>
                <a class="dropdown-item" href="#">Nitificacion1 </a>
            </li> -->
            <li class="dropdown-item" > <a :href="linkToNotifications"> Todas las notificaciones </a></li>
            <!-- <li class="divider" ></li> -->
            <li class="dropdown-item" v-for="notification in notifications" :key="notification.id">
                <a @click="markAsRead(notification.id)" :href="notification.data.link" v-text="notification.data.text" > </a>
                

            </li>
            <li class="divider" ></li>
            <li class="dropdown-item" > <a @click="markAllAsRead" href="#"> Marcar todo como leido </a></li>
        </div>
    </li>
</template>

<script>
    export default {
        data (){
            return { 
                notifications: []
            }
        },
        mounted() {
            axios.get('/notificaciones' ).then (res => { 
                console.log( res.data)
                this.notifications = res.data;
            })
        },
        methods: {

            markAsRead(id){
                axios.patch('/notificaciones/'+ id)
                    .then( res => {
                        this.notifications = res.data
                    })
            },
            markAllAsRead() {
                this.notifications.forEach(notification => {
                    this.markAsRead(notification.id)
                });
            }

        },
        computed: {
            linkToNotifications(){
                return "/notificaciones";
            }
        }
    };
</script>