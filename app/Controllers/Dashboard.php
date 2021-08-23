<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->dashboardmodel = new DashboardModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        $data['total_transaction']  = $this->dashboardmodel->getCountTrx();
        $data['total_product']      = $this->dashboardmodel->getCountProduct();
        $data['total_category']     = $this->dashboardmodel->getCountCategory();
        $data['total_user']         = $this->dashboardmodel->getCountUser();
        // $data['latest_trx']         = $this->dashboard_model->getLatestTrx();

        // $chart['grafik']            = $this->dashboard_model->getGrafik();

        return view('dashboard/dashboard', $data);
        // echo view('_partials/footer', $chart);
    }
}
