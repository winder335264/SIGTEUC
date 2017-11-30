<template>
    <v-card>
      
        <v-card-text>
        <v-card-media
          :src="img"
          height="250px"
        >
        </v-card-media>
        <v-card-title >
          <div>
            <div class="headline">{{title}}</div>
            <span class="grey--text">{{msg}} {{msg1}}</span>
          </div>
        </v-card-title>
</v-card-text>
      </v-card>
      
</template>
<script>
     export default {
        props:{
            img:String,
            msg:String,
            msg1:String,
            title:String,
        },
        data () {
          return {
              
          }
        },
        
     
    }
</script>