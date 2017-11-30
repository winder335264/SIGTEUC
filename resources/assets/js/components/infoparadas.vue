<template>
    

   <v-data-table
          v-bind:headers="headers"
          :items="items"
          class="elevation-1">
       
        <template slot="items" scope="props">
          <td>{{ props.item.nombre }}</td>
          <td class="text-xs-right">{{ props.item.descripcion }}</td>
        </template>
    </v-data-table>
 
</template>

<script>
     export default {
        props:{
            headers:Array,
            items:Array,
        },
        data () {
          return {
              
          }
        },
    }
</script>