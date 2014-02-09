<?php 
class ControllerToolBizimport extends Controller { 
	private $error = array();
			
	public function index() {		
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('tool/bizimport');
		
		$this->data['heading_title'] = $this->language->get('heading_title');
    	$this->data['button_ok'] = 'OK';
		$this->data['ok'] = HTTPS_SERVER . 'index.php?route=tool/bizimport/ok&token=' . $this->session->data['token'];
		 
    	$this->data['button_close'] = 'CLOSE';
		$this->data['close'] = HTTPS_SERVER . 'index.php?route=tool/bizimport/close&token=' . $this->session->data['token'];

		$content = ''; 
		
		if (isset($this->session->data['error'])) 
			$this->data['error'] = $this->session->data['error'];
		else
			$this->data['error'] = '';
				
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
			$this->data['content'] = $this->session->data['content'];
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
			$content .= " <table class='form' border='0'>";
			$content .= "<tr>";
			$content .= " <td>Biz Export file:</td>";
			$content .= "  <td align='left'><input type='file' name='import' size='100' /></td>";
			$content .= "</tr>";
			$content .= "</table>";
			$content .= "<br>";
			$content .= "<p  style='color: #FF0000; font-weight: bold' >".$this->data['error']."</p>";
			$this->data['content'] = $content;
		}
		
	    $this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),       		
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('index.php?route=tool/bizimport', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->template = 'tool/bizimport.tpl';
		$this->children = array(
			'common/header',	
			'common/footer'	
		);
		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}

    public function close() {
		$this->redirect(HTTPS_SERVER . 'index.php?route=tool/bizimport&token=' . $this->session->data['token']);	
    }	

    public function ok() {
		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			$this->session->data['error'] = '';
			if(empty($_FILES["import"]["tmp_name"])){
				$this->session->data['error'] = $this->language->get('error') ;
				$this->redirect(HTTPS_SERVER . 'index.php?route=tool/bizimport&token=' . $this->session->data['token']);	
			}
			$this->load->model('tool/bizimport');
			$this->load->model('catalog/product');
			$content = '';
			
			// Put your logic here
			$this->session->data['content']  = $content;
			$this->session->data['list_content']  = '';
			$this->session->data['success'] = 'Done!';
			$this->redirect(HTTPS_SERVER . 'index.php?route=tool/bizimport&token=' . $this->session->data['token']);
		} else {
			$this->session->data['error'] = 'Error!';
			$this->redirect(HTTPS_SERVER . 'index.php?route=tool/bizimport&token=' . $this->session->data['token']);	
		}			
	}	
}
?>