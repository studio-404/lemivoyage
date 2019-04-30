<?php 
class paymentview
{
	public $data;
	public $string;

	public function index(){
		require_once("app/functions/strip_output.php"); 
		$out = '';
		if(count($this->data)) : 
			foreach ($this->data as $val) {
				$out .= sprintf("<tr>
						<td>%s</td>
						<td>%s %s</td>
						<td><a href=\"/fr/view/adminview/?id=%d\" target=\"_blank\">%s</a></td>
						<td>
							<a href=\"javascript:void(0)\" onclick=\"viewPayment('%s')\"><i class=\"material-icons tooltipped\" data-position=\"bottom\" data-delay=\"50\" data-tooltip=\"დამატებითი ინფორმაცია\">pageview</i></a>
						</td>
					</tr>",
					date("d/m/Y g:i:s", (int)$val['date']), 
					strip_output::index($val['firstname']),
					strip_output::index($val['lastname']),
					strip_output::index($val['tour_id']),
					strip_output::index($val['tour_id']),						
					$val['id']
				);
			}
		endif;
		return $out;
	}
}