<?php

namespace App\Controllers\Api;

use App\Core\Controller;
use App\Models\Work;
use App\Core\Validate;
use App\Core\Response;
use App\Helpers\Helper;

class WorkApiController extends Controller
{

    protected $options;
    protected $response;

    public function __construct()
    {
        $this->response = new Response();
	}

	public function getData()
    {
        $startDate = isset($_GET['start']) ? $_GET['start'] : Date('Y-m-d', strtotime('first day of this month'));
        $endDate = isset($_GET['end']) ? $_GET['end'] : Date('Y-m-d', strtotime('last day of this month'));

        $startDate = Helper::formatDate($startDate, 'Y-m-d H:i:s');
        $endDate = Helper::formatDate($endDate, 'Y-m-d H:i:s');

        $objWork = new Work();
        $works = $objWork->getWorkFromStartToEndDay($startDate, $endDate);
        $datas = [];
        if (count($works) > 0) {
            foreach ($works as $work)
            $datas[] = [
                'id'    => $work['id'],
                'title' => $work['work_name'],
                'start' => !empty($work['start_date']) ? Helper::formatDate($work['start_date'], DATE_ISO8601) : '',
                'end'   => !empty($work['end_date']) ? Helper::formatDate($work['end_date'], DATE_ISO8601) : ''
            ];
        }
        
        return $this->response->JsonResponse($datas);
    }

}