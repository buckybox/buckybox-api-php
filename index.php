<html>
	<head>
		<style>
			html,body{
				background: #fafafa;
				color: #555;
				font-family: Helvetica, Arial;
				padding:10px 20px;
			}
			code{
				background: #ccc;
				color: #111;
				padding:10px;
				line-height: 200%;
			}
			#wrapper{
				max-width:960px;
				margin:0 auto;
			}
			h1,h2,h3{
				background: #889977;
				padding:5px 10px;
			}
			#title{
				background: #009af1;
				text-align: center;
				color:#fff;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
		<h2 id="title">Example file for using the Bucky Box Distributor API PHP Model</h2>
		<p>
			Review the code of this file to see some examples of how to use the included model to quickly interface your system with the Bucky Box Distributor API
		</p>
<?php
	if(!empty($_GET['test'])){
		$code = "Nothing to see here.";
		include_once('Bucky_Box_Distributor_Api.php');
		$api = new Bucky_Box_Distributor_Api();

		$test = $_GET['test'];
		echo "<h1>Test $test $code[0] </h1>";

		switch ($test) {
		 	case 'boxes':
		 		$code = $api->boxes()->all(["embed"=>"extras,images"]);
		 		break;
		 	case 'box':
		 		$code = $api->boxes()->find(12, ["embed"=>"extras,images"]);
		 		break;
		 	case 'customers':
		 		$code = $api->customers()->all(["embed"=>"address"]);
		 		break;
		 	case 'customer':
		 		$code = $api->customers()->find(123,["embed"=>"address"]);
		 		break;
		 	case 'customerbyemail':
		 		$code = $api->customers()->findbyemail(["email"=>"my@email.co.nz","embed"=>"address"]);
		 		break;
		 	case 'customernew':
		 		$code = $api->customers()->create('{"customer": {"first_name": "Will","last_name": "Lau","email": "will@buckybox.com", "delivery_service_id": 146, "address": {
                  "address_1": "12 Bucky Lane",
                  "address_2": "",
                  "suburb": "Boxville",
                  "city": "Wellington",
                  "delivery_note": "Just slip it through the catflap",
                  "home_phone": "01 234 5678",
                  "mobile_phone": "012 345 6789",
                  "work_phone": "98 765 4321"
              }
          }
        }');
		 		break;
		 	case 'deliveryservices':
		 		$code = $api->delivery_services()->all();
		 		break;
		 	case 'orders':
		 		$code = $api->orders()->all();
		 		break;
		 	case 'order':
		 		$code = $api->orders()->find(123);
		 		break;
		 	case 'ordernew':
		 		$code = $api->orders()->create('{ "order": { "box_id": 12, "customer_id": 123 } }');
		 		break;
		 	default:
		 		$code = " - that's not a test.";
		 		break;
	 	} 
	}
?>
		<h2>Boxes</h2>
		<form method="get">
			<input type="hidden" name="test" value="boxes" />
			<label>
				GET /v0/boxes
				<input type="submit" value="Go" />
			</label>
		</form>

		<form method="get">
			<input type="hidden" name="test" value="box" />
			<label>
				GET /v0/boxes/:id
				<input type="submit" value="Go" />
			</label>
		</form>
		<h2>Customers</h2>
		<form method="get">
			<input type="hidden" name="test" value="customers" />
			<label>
				GET /v0/customers
				<input type="submit" value="Go" />
			</label>
		</form>

		<form method="get">
			<input type="hidden" name="test" value="customer" />
			<label>
				GET /v0/customers/:id
				<input type="submit" value="Go" />
			</label>
		</form>

		<form method="get">
			<input type="hidden" name="test" value="customerbyemail" />
			<label>
				GET /v0/customers/:email
				<input type="submit" value="Go" />
			</label>
		</form>

		<form method="get">
			<input type="hidden" name="test" value="customernew" />
			<label>
				POST /v0/customers
				<input type="submit" value="Go" />
			</label>
		</form>
		<h2>Delivery Services</h2>
		<form method="get">
			<input type="hidden" name="test" value="deliveryservices" />
			<label>
				GET /v0/delivery_services		
				<input type="submit" value="Go" />
			</label>
		</form>
		<h2>Orders</h2>
		<form method="get">
			<input type="hidden" name="test" value="orders" />
			<label>
				GET /v0/orders
				<input type="submit" value="Go" />
			</label>
		</form>

		<form method="get">
			<input type="hidden" name="test" value="order" />
			<label>
				GET /v0/orders/:id
				<input type="submit" value="Go" />
			</label>
		</form>

		<form method="get">
			<input type="hidden" name="test" value="ordernew" />
			<label>
				POST /v0/orders
				<input type="submit" value="Go" />
			</label>
		</form>
		<?php
			echo "<code>";
			var_dump($code);
			echo "</code>";
		?>
		</div>
	</body>
</html>

