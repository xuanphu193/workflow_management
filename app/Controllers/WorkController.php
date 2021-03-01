<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Work;
use App\Core\View;
use App\Core\Validate;
use App\Core\Response;

class WorkController extends Controller
{

    protected $options;

    public function __construct()
    {
        $workOptions = require_once 'config/constant.php';
        $this->options = $workOptions['works']['options'];
	}

	public function index()
    {
        $objWork = new Work();
        $works = $objWork->getList();
        View::render('pages/works/list', ['works' => $works]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return View::render('pages/works/create',['options' => $this->options]);
        }

        $workName = isset($_POST['work_name']) ? $_POST['work_name'] : '';
        $startDate = isset($_POST['start_date']) ? $_POST['start_date'] : '';
        $endDate = !empty($_POST['end_date']) ? $_POST['end_date'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';

        $validate = new Validate();
        $validate->requiredCheck($workName, 'Work name');
        $validate->requiredCheck($startDate, 'Start date');
        $validate->dateCheck($startDate, 'Start date');

        $datas = [
            'work_name'     => $workName,
            'start_date'    => $startDate,
            'status'        => $status
        ];

        if (!empty($endDate)) {
            $datas['end_date'] = $endDate;
        }

        if ($validate->isValid()) {
            $objWork = new Work();
            $objWork->create($datas);

            return Response::redirect('/work');
        }

        View::render('pages/works/create',['options' => $this->options, 'errors' => $validate->getError(), 'works' => $datas]);        
    }

    public function edit(string $id)
    {
        $validate = new Validate();
        $validate->numberCheck($id);

        if (!$validate->isValid()) {
            return Response::redirect('/work');
        }

        $objWork = new Work();
        $works = $objWork->getWorkDetailById($id);
        if (count($works) === 0) {
            return Response::redirect('/work');
        }

        return View::render('pages/works/edit',['options' => $this->options, 'works' => $works[0]]);
    }

    public function update(string $id)
    {
        $validate = new Validate();
        $validate->numberCheck($id);

        if (!$validate->isValid()) {
            return Route::redirect('/work');
        }
        
        $workName = isset($_POST['work_name']) ? $_POST['work_name'] : '';
        $startDate = isset($_POST['start_date']) ? $_POST['start_date'] : '';
        $endDate = !empty($_POST['end_date']) ? $_POST['end_date'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';

        $validate = new Validate();
        $validate->requiredCheck($workName, 'Work name');
        $validate->requiredCheck($startDate, 'Start date');
        $validate->dateCheck($startDate, 'Start date');

        $datas = [
            'work_name'     => $workName,
            'start_date'    => $startDate,
            'status'        => $status
        ];

        if (!empty($endDate)) {
            $datas['end_date'] = $endDate;
        }

        if ($validate->isValid()) {
            $objWork = new Work();
            $objWork->update($id, $datas);

            return Response::redirect('/work');
        }

        return View::render('pages/works/edit',['options' => $this->options, 'errors' => $validate->getError(), 'works' => $datas]);        
    }

    public function delete(string $id)
    {
        $validate = new Validate();
        $validate->numberCheck($id);

        if ($validate->isValid()) {
            $objWork = new Work();
            $objWork->delete($id);
        }
        
        return Response::redirect('/work');
    }

}