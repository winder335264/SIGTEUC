{"filter":false,"title":"2017_10_18_194415_AddBusEnHorarios_M_UC.php","tooltip":"/database/migrations/2017_10_18_194415_AddBusEnHorarios_M_UC.php","undoManager":{"mark":42,"position":42,"stack":[[{"start":{"row":15,"column":7},"end":{"row":15,"column":10},"action":"remove","lines":[" //"],"id":2},{"start":{"row":15,"column":7},"end":{"row":19,"column":11},"action":"insert","lines":["Schema::table('RUTA', function (Blueprint $table) {","            $table->float('distancia');","            $table->float('duracion');","            ","        });"]}],[{"start":{"row":15,"column":22},"end":{"row":15,"column":26},"action":"remove","lines":["RUTA"],"id":3},{"start":{"row":15,"column":22},"end":{"row":15,"column":23},"action":"insert","lines":["<"]}],[{"start":{"row":15,"column":23},"end":{"row":15,"column":24},"action":"insert","lines":["H"],"id":4}],[{"start":{"row":15,"column":24},"end":{"row":15,"column":25},"action":"insert","lines":["O"],"id":5}],[{"start":{"row":15,"column":25},"end":{"row":15,"column":26},"action":"insert","lines":["A"],"id":6}],[{"start":{"row":15,"column":26},"end":{"row":15,"column":27},"action":"insert","lines":["R"],"id":7}],[{"start":{"row":15,"column":27},"end":{"row":15,"column":28},"action":"insert","lines":["I"],"id":8}],[{"start":{"row":15,"column":28},"end":{"row":15,"column":29},"action":"insert","lines":["O"],"id":9}],[{"start":{"row":15,"column":22},"end":{"row":15,"column":23},"action":"remove","lines":["<"],"id":10}],[{"start":{"row":15,"column":24},"end":{"row":15,"column":25},"action":"insert","lines":["R"],"id":11}],[{"start":{"row":15,"column":29},"end":{"row":15,"column":30},"action":"insert","lines":["_"],"id":12}],[{"start":{"row":15,"column":22},"end":{"row":15,"column":30},"action":"remove","lines":["HORARIO_"],"id":13},{"start":{"row":15,"column":22},"end":{"row":15,"column":34},"action":"insert","lines":["HORARIO_M_UC"]}],[{"start":{"row":16,"column":24},"end":{"row":16,"column":25},"action":"remove","lines":["t"],"id":14}],[{"start":{"row":16,"column":23},"end":{"row":16,"column":24},"action":"remove","lines":["a"],"id":15}],[{"start":{"row":16,"column":22},"end":{"row":16,"column":23},"action":"remove","lines":["o"],"id":16}],[{"start":{"row":16,"column":21},"end":{"row":16,"column":22},"action":"remove","lines":["l"],"id":17}],[{"start":{"row":16,"column":20},"end":{"row":16,"column":21},"action":"remove","lines":["f"],"id":18}],[{"start":{"row":16,"column":20},"end":{"row":16,"column":21},"action":"insert","lines":["S"],"id":19}],[{"start":{"row":16,"column":21},"end":{"row":16,"column":22},"action":"insert","lines":["T"],"id":20}],[{"start":{"row":16,"column":22},"end":{"row":16,"column":23},"action":"insert","lines":["R"],"id":21}],[{"start":{"row":16,"column":23},"end":{"row":16,"column":24},"action":"insert","lines":["I"],"id":22}],[{"start":{"row":16,"column":24},"end":{"row":16,"column":25},"action":"insert","lines":["N"],"id":23}],[{"start":{"row":16,"column":25},"end":{"row":16,"column":26},"action":"insert","lines":["G"],"id":24}],[{"start":{"row":16,"column":25},"end":{"row":16,"column":26},"action":"remove","lines":["G"],"id":25}],[{"start":{"row":16,"column":24},"end":{"row":16,"column":25},"action":"remove","lines":["N"],"id":26}],[{"start":{"row":16,"column":23},"end":{"row":16,"column":24},"action":"remove","lines":["I"],"id":27}],[{"start":{"row":16,"column":22},"end":{"row":16,"column":23},"action":"remove","lines":["R"],"id":28}],[{"start":{"row":16,"column":21},"end":{"row":16,"column":22},"action":"remove","lines":["T"],"id":29}],[{"start":{"row":16,"column":20},"end":{"row":16,"column":21},"action":"remove","lines":["S"],"id":30}],[{"start":{"row":16,"column":20},"end":{"row":16,"column":21},"action":"insert","lines":["s"],"id":31}],[{"start":{"row":16,"column":21},"end":{"row":16,"column":22},"action":"insert","lines":["t"],"id":32}],[{"start":{"row":16,"column":22},"end":{"row":16,"column":23},"action":"insert","lines":["r"],"id":33}],[{"start":{"row":16,"column":23},"end":{"row":16,"column":24},"action":"insert","lines":["i"],"id":34}],[{"start":{"row":16,"column":24},"end":{"row":16,"column":25},"action":"insert","lines":["n"],"id":35}],[{"start":{"row":16,"column":25},"end":{"row":16,"column":26},"action":"insert","lines":["g"],"id":36}],[{"start":{"row":17,"column":12},"end":{"row":17,"column":38},"action":"remove","lines":["$table->float('duracion');"],"id":37}],[{"start":{"row":16,"column":28},"end":{"row":16,"column":37},"action":"remove","lines":["distancia"],"id":38},{"start":{"row":16,"column":28},"end":{"row":16,"column":29},"action":"insert","lines":["b"]}],[{"start":{"row":16,"column":29},"end":{"row":16,"column":30},"action":"insert","lines":["u"],"id":39}],[{"start":{"row":16,"column":30},"end":{"row":16,"column":31},"action":"insert","lines":["s"],"id":40}],[{"start":{"row":29,"column":8},"end":{"row":29,"column":10},"action":"remove","lines":["//"],"id":41},{"start":{"row":29,"column":8},"end":{"row":33,"column":11},"action":"insert","lines":[" Schema::table('RUTA', function (Blueprint $table) {","            $table->dropColumn('distancia');","            $table->dropColumn('duracion');","            ","        });"]}],[{"start":{"row":30,"column":32},"end":{"row":30,"column":41},"action":"remove","lines":["distancia"],"id":42},{"start":{"row":30,"column":32},"end":{"row":30,"column":35},"action":"insert","lines":["bus"]}],[{"start":{"row":29,"column":24},"end":{"row":29,"column":28},"action":"remove","lines":["RUTA"],"id":43},{"start":{"row":29,"column":24},"end":{"row":29,"column":36},"action":"insert","lines":["HORARIO_M_UC"]}],[{"start":{"row":31,"column":10},"end":{"row":31,"column":43},"action":"remove","lines":["  $table->dropColumn('duracion');"],"id":44}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":29,"column":8},"end":{"row":33,"column":11},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1508355926618,"hash":"46e3feb8b4e8a3d61c4d164d529562ed66d9e522"}