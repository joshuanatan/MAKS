<?php
set_time_limit(0);
class Feed extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function sales(){
        $produk = array(
            "12233308","14962802","17547961","17547970","17547989","17547998","17548817","17548826","17548835","17548844","17559154","17559163","17559172","17559181","12184513","3689441","3689450","10011588","10011597","10011604","10011631","10011640","10011659","10011668","10011677","10011686","10011695","10143178","10222967","3606673","3630271","3643285","3643294","3778336","13525723","12400912","12400921","10016298","10016314","10016341","10016396","10016412","10016449","10016458","10016467","10016529","8599164","8599173","8599182","8599191","8599208","8599217","8599226","8599235","8599244","8599253","8599262","8599271","8630137","8630146","8630155","8630164","8630182","8630191","8630208","8630217","8630226","8630235","8630253","8630262","8654997","8655003","8655021","8655030","8655049","8655058","8655085","8655094","8655101","8655129","9354845","9354854","9372665","9372674","9372807","9372816","9372898","9372905","9372889","9385053","9385062","9385071","9385080","9333322","9333331","9333340","9333359","9363693","9363700","9363719","9363728","9363737","9363746","9533848","9533857","9533866","9533875","9533884","9533893","9533900","9533919","9533928","9533937","9533946","9533955","9533964","9533973","9533982","9533991","9534007","9534016","9534052","9534061","9534070","9534089","9534098","9534105","9534114","9534123","9534132","9580743","9580752","9580761","9580823","9580832","9580841","9580850","9580869","9580878","9580887","9580896","9580903","9580912","9580921","9580930","9543186","9543195","9543202","9543211","9543220","9543239","9543248","9543257","9543266","9543275","9543284","9543293","9543300","9543319","9543328","9543337","9543346","9543355","9543364","9543373","9543382","9543391","9543408","9543417","9543426","9543435","9543444","9543453","9543462","9543471","9543480","9543499","9543506","9543515","9543524","9543533","9543542","9543551","9573297","9573500","9573519","9573528","9573546","9573555","9573564","9573582","9573591","9573608","9580967","9580976","9580985","9581000","9581019","9581028","9581037","9581046","9581055","9581064","9581073","9581082","9581108","9581117","9581126","9581135","9581144","9581153","11529527","12908008","11902480","11803480","19048818","19048827","19048836","19048845","19048989","19049004","19049095","19049406","19049513","19051868","19051877","19986466","23962867","20340632","20341131","20341140","20341168","20341177","20341186","20341435","20341604","20719957","22286420","20376390","20376416","20376425","20376452","20376461","20376523","20476611","20731264","20731273","20731282","20731291","20731335","20731353","21030626","22467145","24698535","24698580","24698599","24698606","24698615","24698624","24698633","24698713","24698722","24698777","24698786","24698795","21042042","21042051","21042122","21042177","21042202","21042220","22510061","22510070","22510089","22510098","22510105","22510114","11479742","20531702","20531711","20531720","21361957","21363231","23204971","23204980","23204999","21717635","22289267","22289285","22289294","22289561","22289703","22289749","22289758","22289767","22522085","22522156","22249961","22249970","22249989","22249998","22250002","22250011","22250020","22250039","24377319","22298524","22298533","22298542","22298588","22298604","22298775","22301340","10669011","11000123","11001024","11093088","11227666","11351414","11354564","11378646","11427235","11462483","11480258","11568342","11585994","11798666","11924288","12032463","12041882","12095100","12195387","12241728","12343529","12349210","12353214","12418154","12474138","12474263","12530791","12632136","12638014","12657548","12657557","12674065","12696381","12769570","12771567","12777972","12794480","12846272","12864690","12868409","12881439","13021446","13066292","13135832","13135841","13140657","13163187","13181078","13183487","13192726","13215684","13238007","13256309","13259422","13264050","13278616","13278625","13304926","13306595","13334297","13338104","13347032","13348853","13364808","13398782","13472816","13508742","13512924","13513263","13514995","13517170","13517483","13564002","13565725","13565789","13565976","13566108","13566519","13597736","13597781","13599609","13599636","13600945","13656485","13689388","13689397","13689440","13724188","13762539","13762548","13762575","13762584","13763958","13824098","13845299","13845324","13850416","13861753","13862181","13862190","13870538","13870609","13882114","13897617","13899348","13922115","13922124","13926059","13929449","13929458","13945341","13961823","13961878","14007326","14008941","14045517","14045526","14049693","14049737","14056167","14110035","14111909","14112266","14112293","14124324","14128713","14128740","14139872","14142779","14142920","14195454","14226689","14229168","14285302","14285464","14298236","14312184","14324439","14324448","14324537","14374395","14375661","14388700","14394159","14397870","14403086","14403166","14406789","14406823","14414387","14436925","14448485","14448832","14449171","14449180","14454414","14458830","14478130","14491240","14494167","14528317","14531321","14531349","14532482","14533016","14550284","14555065","14555172","14555378","14555430","14555912","14565018","14565198","14574811","14594666","14596360","14596379","14598117","14618765","14632123","14633659","14633668","14634229","14649553","14649562","14650363","14651577","14651586","14651595","14651871","14651899","14684443","14684452","14687217","14687226","14692738","14692747","14692756","14692765","14692774","14692792","14692809","14692818","14692827","14692845","14692872","14692881","14696556","14726344","14726353","14726362","14727941","14774239","14788082","14788779","14788804","14788822","14788859","14788868","14790293","14790300","14791756","14791765","14791774","14791783","14792317","14792326","14792344","14834469","14834487","14834496","14856418","14856785","14856794","14856801","14861091","14861108","14861868","14861877","14861886","14861895","14890274","14890283","14890292","14890309","14890318","14894109","14894118","14927869","14927878","14929992","14930006","14930015","14930024","14930426","14930435","14930444","14936902","14936920","15008010","15008029","15008038","15008047","15009699","15017037","15017126","15017135","15021602","15021620","15021648","15025064","15025073","15025082","15047611","15047620","15049477","15049486","15049495","15049502","15050705","15050714","15051062","15051071","15051222","15056316","15056325","15056629","15056861"
        );
        $toko = array(
            "215","217","243","255","257","261","263","267","273","275","283","315","371","375","377","379","389","405","409","415","419","426","441","453","471","501","503","507","511","517","523","528","533","537","545","553","555","563","567","571","585","595","617","637","641","643","332","266","327","645","649","320","653","655","663","673","677","697","804","376","221","269","303","311","309","347","349","353","386","305","245","345","393","287","321","323","446","293","299","307","447","313","277","289","355","337","359","350","361","594","298","252","413","368","296","369","333","351","223","227","338","219","233","423","235","249","417","367","284","251","253","258","256","290","288","239","254","264","294","306","340","310","363","326","150","388","392","365","387","358","448","300","302","344","334","336","322","381","539","619","364","370","366","346","457","352","281","703","241","343","329","282","339","443","312","314","362","382","384","704","151","286","316","317","319","811","812","813","841","842","157","101","536","672","754","755","756","757","758","759","760","181","182","183","184","751","752","753","318","761","473"
        );
        $start ="2018-01-01";
        $end = "2020-02-13";
        $a = 0;
        while (strtotime($start) <= strtotime($end)) {
            $jumlah_transaksi = rand(20,30);
            for($i = 0; $i<$jumlah_transaksi; $i++){
                $trxnum = 3000+($a*1000)+$i;
                $data = array(
                    "STORE" => $toko[rand(0,count($toko)-1)],
                    "TRXDATE" => date('Y-m-d',strtotime($start)),
                    "TRXNUM" => $trxnum,
                    "TRXAMT" => 0
                );
                $config = array(
                    "hostname" => "127.0.0.1",
                    "username" => "root",
                    "password" => "",
                    "database" => "maks_dataset",
                    "dbdriver" => "mysqli"
                );
                $db1 = $this->load->database($config,true);
                $db1->insert("tbl_sales",$data);

                $jumlah_item = rand(1,9);
                $control = array();
                $trxamt = 0;
                for($b = 0; $b<$jumlah_item; $b++){
                    $item_price = rand(100000,500000);
                    $item_qty = rand(1,10);
                    do{
                        $id_produk = $produk[rand(0,count($produk)-1)];
                    }
                    while(in_array($id_produk,$control));
                    $data = array(
                        "TRXNUM" => $trxnum,
                        "SKU" => $id_produk,
                        "ITMPRICE" => $item_price,
                        "ITMQTY" => $item_qty,
                        "NETSALES_INCL_PPN" => ($item_price*$item_qty),
                    );
                    $db1->insert("tbl_detail_sales",$data);
                    $trxamt += ($item_price*$item_qty);
                }
                $where = array(
                    "TRXNUM" => $trxnum
                );
                $data = array(
                    "trxamt" => $trxamt
                );
                $db1->update("tbl_sales",$data,$where);
            }
            $start = date ("Y-m-d", strtotime("+1 day", strtotime($start)));
            $a++;
        }
    }
    public function eliminating_multiple_store(){
        $query = "select distinct store,store_name,district,district_name,store_city,store_class from tbl_toko";
        $config = array(
            "hostname" => "127.0.0.1",
            "username" => "root",
            "password" => "",
            "database" => "maks_dataset",
            "dbdriver" => "mysqli"
        );
        $db1 = $this->load->database($config,true);
        $result = $db1->query($query)->result_array();

        $query = "delete from tbl_toko";
        $db1->query($query);
        for($a = 0; $a<count($result); $a++){
            $data = array(
                "store" => $result[$a]["store"] ,
                "store_name" => $result[$a]["store_name"] ,
                "district" => $result[$a]["district"] ,
                "district_name" => $result[$a]["district_name"] ,
                "store_city" => $result[$a]["store_city"] ,
                "store_class" => $result[$a]["store_class"]
            );
            $db1->insert("tbl_toko",$data);
        }
    }
}
?>