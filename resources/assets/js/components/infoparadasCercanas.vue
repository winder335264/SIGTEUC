<template>
    

   <v-data-table
      v-bind:headers="cabecera"
      :items="items"
      
      
      class="elevation-1"
    >
    <template slot="items" scope="props">
          <td>{{ props.item.num }}</td>
          <td class="text-xs-right">{{ props.item.nombre}}</td>
          <td class="text-xs-right">{{ props.item.nombre_ruta}}</td>
        <td class="text-xs-right">{{ props.item.distancia}}</td>
    </template>
  </v-data-table>
 
</template>

<script>
     export default {
        props:{
            items:Array,
        },
        data () {
          return {
            cabecera: [
       
          {text: '#',sortable: false,align:'left'},
          { text: 'Nombre', sortable: false, },
          { text: 'Ruta', sortable: false, },
          { text: 'Distancia (Km)', sortable: false, },
        ],
              
          }
        },
        
     
    }
</script>