<?

namespace Hcode;

use Rain\Tpl;

class Page
{
    private $tpl;
    private $options = [];
    private $defaults = [
        "data"=>[

        ]
    ];
    public function __construct($opts = array())
    {

        $this->options = array_merge($this->defaults, $opts);

        $config = array(
            "tpl_dir"       => $_SERVER['DOCUMENT_RROT']."/views",
            "cache_dir"     => $_SERVER['documento_root']."/views-cache",
            "debug"         => false
        );

        Tpl::configure($config);

        $tpl = new Tpl;

        $this->tpl = new Tpl;
        $this->setData($this->options["data"]);

        $this->tpl->draw('header');

    }

    private function setData($data = array()){

        foreach($data as $key => $value){
            $this->tpl->assign($key, $value);
        }

    }

    public function setTpl($name, $data = array(), $returnHTML = false){
        $this->setData($data);
    }

    public function __destruct()
    {
        $this->tpl->draw('footer');
    }
}
