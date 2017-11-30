<template>
    
   <v-data-table
      v-bind:headers="headers"
      :items="items"
    
      class="elevation-1"
    >
    <template slot="items" scope="props">
      <td>{{ props.item.Horas }}</td>
      <td class="text-xs-right">{{ props.item.bus }}</td>
    
    </template>
  </v-data-table>
</template>

<script>
     export default {
         props:{
            headers:Array,
            items:Array,
            nombre:String
            
        },
        data () {
          return {
              
          }
        },
        
     
    }
</script>