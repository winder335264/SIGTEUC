{"filter":false,"title":"2017_10_18_194541_AddBusEnHorarios_UC_M.php","tooltip":"/database/migrations/2017_10_18_194541_AddBusEnHorarios_UC_M.php","undoManager":{"mark":6,"position":6,"stack":[[{"start":{"row":15,"column":8},"end":{"row":15,"column":10},"action":"remove","lines":["//"],"id":2},{"start":{"row":15,"column":8},"end":{"row":19,"column":11},"action":"insert","lines":["Schema::table('HORARIO_M_UC', function (Blueprint $table) {","            $table->string('bus');","            ","            ","        });"]}],[{"start":{"row":15,"column":32},"end":{"row":15,"column":33},"action":"remove","lines":["_"],"id":3}],[{"start":{"row":15,"column":31},"end":{"row":15,"column":32},"action":"remove","lines":["M"],"id":4}],[{"start":{"row":15,"column":33},"end":{"row":15,"column":34},"action":"insert","lines":["_"],"id":5}],[{"start":{"row":15,"column":34},"end":{"row":15,"column":35},"action":"insert","lines":["M"],"id":6}],[{"start":{"row":29,"column":8},"end":{"row":29,"column":10},"action":"remove","lines":["//"],"id":7},{"start":{"row":29,"column":8},"end":{"row":33,"column":11},"action":"insert","lines":[" Schema::table('HORARIO_M_UC', function (Blueprint $table) {","            $table->dropColumn('bus');","          ","            ","        });"]}],[{"start":{"row":29,"column":24},"end":{"row":29,"column":36},"action":"remove","lines":["HORARIO_M_UC"],"id":8},{"start":{"row":29,"column":24},"end":{"row":29,"column":36},"action":"insert","lines":["HORARIO_UC_M"]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":29,"column":36},"end":{"row":29,"column":36},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1508355970082,"hash":"0d2cfc7b26afeceb6f8e67221b3949aadebca0a2"}