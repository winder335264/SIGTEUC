{"filter":false,"title":"2017_10_18_185132_modificarHorario_M_UC_Hora.php","tooltip":"/database/migrations/2017_10_18_185132_modificarHorario_M_UC_Hora.php","undoManager":{"mark":50,"position":50,"stack":[[{"start":{"row":15,"column":8},"end":{"row":15,"column":10},"action":"remove","lines":["//"],"id":2},{"start":{"row":15,"column":8},"end":{"row":18,"column":33},"action":"insert","lines":[" Schema::create('HORARIO_M_UC', function (Blueprint $table) {","            $table->increments('id'); ","            $table->integer('idRuta')->unsigned();","            $table->time('hora');"]}],[{"start":{"row":16,"column":11},"end":{"row":17,"column":50},"action":"remove","lines":[" $table->increments('id'); ","            $table->integer('idRuta')->unsigned();"],"id":3}],[{"start":{"row":16,"column":10},"end":{"row":16,"column":11},"action":"remove","lines":[" "],"id":4}],[{"start":{"row":16,"column":9},"end":{"row":16,"column":10},"action":"remove","lines":[" "],"id":5}],[{"start":{"row":16,"column":8},"end":{"row":16,"column":9},"action":"remove","lines":[" "],"id":6}],[{"start":{"row":16,"column":4},"end":{"row":16,"column":8},"action":"remove","lines":["    "],"id":7}],[{"start":{"row":16,"column":0},"end":{"row":16,"column":4},"action":"remove","lines":["    "],"id":8}],[{"start":{"row":15,"column":69},"end":{"row":16,"column":0},"action":"remove","lines":["",""],"id":9}],[{"start":{"row":16,"column":33},"end":{"row":17,"column":0},"action":"insert","lines":["",""],"id":10},{"start":{"row":17,"column":0},"end":{"row":17,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":17,"column":12},"end":{"row":17,"column":16},"action":"insert","lines":[" });"],"id":11},{"start":{"row":17,"column":0},"end":{"row":17,"column":13},"action":"remove","lines":["             "]},{"start":{"row":17,"column":0},"end":{"row":17,"column":9},"action":"insert","lines":["         "]}],[{"start":{"row":27,"column":7},"end":{"row":27,"column":10},"action":"remove","lines":[" //"],"id":12},{"start":{"row":27,"column":7},"end":{"row":30,"column":11},"action":"insert","lines":["Schema::table('RUTA', function (Blueprint $table) {","        $table->dropColumn('latitud');","        $table->dropColumn('longitud');","        });"]}],[{"start":{"row":27,"column":22},"end":{"row":27,"column":26},"action":"remove","lines":["RUTA"],"id":13},{"start":{"row":27,"column":22},"end":{"row":27,"column":34},"action":"insert","lines":["HORARIO_M_UC"]}],[{"start":{"row":16,"column":20},"end":{"row":16,"column":24},"action":"remove","lines":["time"],"id":14},{"start":{"row":16,"column":20},"end":{"row":16,"column":21},"action":"insert","lines":["s"]}],[{"start":{"row":16,"column":21},"end":{"row":16,"column":22},"action":"insert","lines":["t"],"id":15}],[{"start":{"row":16,"column":22},"end":{"row":16,"column":23},"action":"insert","lines":["r"],"id":16}],[{"start":{"row":16,"column":23},"end":{"row":16,"column":24},"action":"insert","lines":["i"],"id":17}],[{"start":{"row":16,"column":24},"end":{"row":16,"column":25},"action":"insert","lines":["n"],"id":18}],[{"start":{"row":16,"column":25},"end":{"row":16,"column":26},"action":"insert","lines":["g"],"id":19}],[{"start":{"row":28,"column":28},"end":{"row":28,"column":35},"action":"remove","lines":["latitud"],"id":20},{"start":{"row":28,"column":28},"end":{"row":28,"column":29},"action":"insert","lines":["h"]}],[{"start":{"row":28,"column":29},"end":{"row":28,"column":30},"action":"insert","lines":["o"],"id":21}],[{"start":{"row":28,"column":30},"end":{"row":28,"column":31},"action":"insert","lines":["r"],"id":22}],[{"start":{"row":28,"column":31},"end":{"row":28,"column":32},"action":"insert","lines":["a"],"id":23}],[{"start":{"row":29,"column":7},"end":{"row":29,"column":39},"action":"remove","lines":[" $table->dropColumn('longitud');"],"id":24}],[{"start":{"row":29,"column":6},"end":{"row":29,"column":7},"action":"remove","lines":[" "],"id":25}],[{"start":{"row":29,"column":5},"end":{"row":29,"column":6},"action":"remove","lines":[" "],"id":26}],[{"start":{"row":29,"column":4},"end":{"row":29,"column":5},"action":"remove","lines":[" "],"id":27}],[{"start":{"row":29,"column":0},"end":{"row":29,"column":4},"action":"remove","lines":["    "],"id":28}],[{"start":{"row":28,"column":35},"end":{"row":29,"column":0},"action":"remove","lines":["",""],"id":29}],[{"start":{"row":15,"column":17},"end":{"row":15,"column":23},"action":"remove","lines":["create"],"id":30},{"start":{"row":15,"column":17},"end":{"row":15,"column":18},"action":"insert","lines":["t"]}],[{"start":{"row":15,"column":18},"end":{"row":15,"column":19},"action":"insert","lines":["a"],"id":31}],[{"start":{"row":15,"column":19},"end":{"row":15,"column":20},"action":"insert","lines":["b"],"id":32}],[{"start":{"row":15,"column":20},"end":{"row":15,"column":21},"action":"insert","lines":["k"],"id":33}],[{"start":{"row":15,"column":21},"end":{"row":15,"column":22},"action":"insert","lines":["e"],"id":34}],[{"start":{"row":15,"column":21},"end":{"row":15,"column":22},"action":"remove","lines":["e"],"id":35}],[{"start":{"row":15,"column":20},"end":{"row":15,"column":21},"action":"remove","lines":["k"],"id":36}],[{"start":{"row":15,"column":20},"end":{"row":15,"column":21},"action":"insert","lines":["l"],"id":37}],[{"start":{"row":15,"column":21},"end":{"row":15,"column":22},"action":"insert","lines":["e"],"id":38}],[{"start":{"row":16,"column":28},"end":{"row":16,"column":29},"action":"remove","lines":["h"],"id":39}],[{"start":{"row":16,"column":28},"end":{"row":16,"column":29},"action":"insert","lines":["h"],"id":40}],[{"start":{"row":16,"column":28},"end":{"row":16,"column":29},"action":"remove","lines":["h"],"id":41}],[{"start":{"row":16,"column":28},"end":{"row":16,"column":29},"action":"insert","lines":["H"],"id":42}],[{"start":{"row":16,"column":32},"end":{"row":16,"column":33},"action":"insert","lines":["s"],"id":43}],[{"start":{"row":28,"column":32},"end":{"row":28,"column":33},"action":"insert","lines":["s"],"id":44}],[{"start":{"row":28,"column":28},"end":{"row":28,"column":29},"action":"remove","lines":["h"],"id":45}],[{"start":{"row":28,"column":28},"end":{"row":28,"column":29},"action":"insert","lines":["H"],"id":46}],[{"start":{"row":16,"column":36},"end":{"row":17,"column":0},"action":"insert","lines":["",""],"id":47},{"start":{"row":17,"column":0},"end":{"row":17,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":17,"column":12},"end":{"row":17,"column":40},"action":"insert","lines":["$table->dropColumn('Horas');"],"id":48}],[{"start":{"row":17,"column":32},"end":{"row":17,"column":33},"action":"remove","lines":["H"],"id":49}],[{"start":{"row":17,"column":32},"end":{"row":17,"column":33},"action":"insert","lines":["h"],"id":50}],[{"start":{"row":17,"column":36},"end":{"row":17,"column":37},"action":"remove","lines":["s"],"id":51}],[{"start":{"row":17,"column":11},"end":{"row":17,"column":39},"action":"remove","lines":[" $table->dropColumn('hora');"],"id":52}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":28,"column":6},"end":{"row":30,"column":11},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1508353655226,"hash":"ea6e275ec63856359c4d81ebcbd5c6ad91b25b64"}