<?php
class Cart extends CI_Controller {
  //public $paypal_data = '';
  //public $tax;
  //public $shipping;
  //public $total = 0;
  //public $grand_total;

  // Cart index
  public function index() {
    $data["main_content"] = "cart";
    $this->load->view('layouts/main',$data);
  }

  // Add to Cart
  public function add() {
    // Item data
    $data = array(
      'id' => $this->input->post('item_number'),
      'qty' => $this->input->post('qty'),
      'price' => $this->input->post('price'),
      'name' => $this->input->post('title')
    );
    //print_r($data); die();
    // Insert into Cart
    $this->cart->insert($data);
    redirect('products');
  }

  public function update($in_cart = null) {
    $data = $_POST;
    $this->cart->update($data);
    // Show Cart Page
    redirect('cart','refresh');
  }

  // Process form
  /*
  public function process() {
    if($_POST) {
      foreach($this->input->post('item_name') as $key => $value) {
        // Get tax and shipping from config
        $this->tax = $this->config->item('tax');
        $this->shipping = $this->config->item('shipping');

        $item_id = $this->post('item_code')[$key];
        $product = $this->Product_model->get_product_details($item_id);

        $paypal_product['itmes'][] = array(
          'item_name' => $product->title,
          'item_price' => $product->price,
          'item_code' => $item_id,
          'item_qty' => $this->input->post('item_qty')[$key]
        );

        // Create order array
        $order_data = array(
          'product_id' => $item_id,
          'user_id' => $this->session->userdata('user_id'),
          'transaction_id' => 0,
          'qty' => $this->input->post('item_qty')[$key],
          'price' => $subtotal,
          'address' => $this->input->post('address'),
          'address2' => $this->input->post('address2'),
          'city' => $this->input->post('city'),
          'state' => $this->input->post('state'),
          'zipcode' => $this->input->post('zipcode')
        );

        // Add Order data
        $this->Product_model->add_order($order_data);
      }

      // Get grand total
      $this->grand_total = $this->total + $this->tax + $this->shipping;

      // Create array of costs
      $paypal_product['assets'] = array(
        'tax_total' => $this->tax,
        'shipping_cost' => $this->shipping,
        'grand_total' => $this->total
      );

      // Session array
      $_SESSION['paypal_products'] = $paypal_product;
    }
  }
  */

}
 ?>
