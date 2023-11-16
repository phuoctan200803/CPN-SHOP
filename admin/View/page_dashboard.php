            <div id="top" class="sa-app__body px-2 px-lg-4">
                <div class="container pb-6">
                    <div class="py-5">
                        <div class="row g-4 align-items-center">
                            <div class="col">
                                <h1 class="h3 m-0">Dashboard</h1>
                            </div>
                            <div class="col-auto d-flex">
                                <select class="form-select me-3">
                                    <!-- <option selected="">7 October, 2021</option> -->
                                </select>
                                <a href="#" class="btn btn-primary">Export</a>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 g-xl-5">
                        <div class="col-12 col-md-4 d-flex">
                            <div class="card saw-indicator flex-grow-1" data-sa-container-query="{&quot;340&quot;:&quot;saw-indicator--size--lg&quot;}">
                                <div class="sa-widget-header saw-indicator__header">
                                    <h2 class="sa-widget-header__title">Tổng lượt bán</h2>
                                </div>
                                <div class="saw-indicator__body">
                                    <div class="saw-indicator__value"><?= $data['don_hang'][0]['tong_don_hang'] ?></div>
                                    <div class="saw-indicator__delta saw-indicator__delta--rise">
                                        <div class="saw-indicator__delta-direction">
                                            <i class="fas fa-angle-up"></i>
                                        </div>
                                        <div class="saw-indicator__delta-value">34.7%</div>
                                    </div>
                                    <div class="saw-indicator__caption">Compared to April 2021</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 d-flex">
                            <div class="card saw-indicator flex-grow-1" data-sa-container-query="{&quot;340&quot;:&quot;saw-indicator--size--lg&quot;}">
                                <div class="sa-widget-header saw-indicator__header">
                                    <h2 class="sa-widget-header__title">Trung bình đơn hàng</h2>

                                </div>
                                <div class="saw-indicator__body">
                                    <div class="saw-indicator__value">
                                        <?= number_format($data['don_hang'][0]['trung_binh_don_hang'], 0) ?> VND
                                    </div>
                                    <div class="saw-indicator__delta saw-indicator__delta--fall">
                                        <div class="saw-indicator__delta-direction">
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                        <div class="saw-indicator__delta-value">12.0%</div>
                                    </div>
                                    <div class="saw-indicator__caption">Compared to April 2021</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 d-flex">
                            <div class="card saw-indicator flex-grow-1" data-sa-container-query="{&quot;340&quot;:&quot;saw-indicator--size--lg&quot;}">
                                <div class="sa-widget-header saw-indicator__header mr-auto">
                                    <h2 class="sa-widget-header__title ">Doanh thu</h2>

                                </div>
                                <div class="saw-indicator__body">
                                    <div class="saw-indicator__value">
                                        <?= number_format($data['don_hang'][0]['doanh_thu']) ?>VND</div>
                                    <div class="saw-indicator__delta saw-indicator__delta--rise">
                                        <div class="saw-indicator__delta-direction">
                                            <i class="fas fa-angle-up"></i>
                                        </div>
                                        <div class="saw-indicator__delta-value">27.9%</div>
                                    </div>
                                    <div class="saw-indicator__caption">Compared to April 2021</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-xxl-12 d-flex">
                            <div class="card flex-grow-1 saw-table">
                                <div class="sa-widget-header saw-table__header">
                                    <h2 class="sa-widget-header__title">Thống kê danh mục</h2>

                                </div>
                                <div class="saw-table__body sa-widget-table text-nowrap">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Mã loại</th>
                                                <th>Tên loại</th>
                                                <th>Số lượng</th>
                                                <th>Giá thấp nhất</th>
                                                <th>Giá cao nhất</th>
                                                <th>Giá trung bình</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['thong_ke'] as $item) { ?>
                                                <tr>
                                                    <td>
                                                        <a href="app-order.html" class="text-reset">#<?= $item['madm'] ?></a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex fs-6">
                                                            <div class=""><?= $item['tendm'] ?></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?= $item['so_luong'] ?>
                                                    </td>

                                                    </td>
                                                    <td><?= number_format($item['gia_min'])  ?> VND</td>
                                                    <td><?= number_format($item['gia_max'])  ?> VND</td>
                                                    <td><?= number_format($item['gia_avg'], 2)  ?> VND</td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-xxl-6 d-flex">
                            <div id="piechart" style="width: 100vw; height: 500px;"></div>
                        </div>
                        <div class="col-12 col-xxl-6 d-flex">
                            <div id="columnchart_values" style="width: 900px; height: 500px;"></div>
                        </div>

                    </div>

                </div>
            </div>


            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['tendm', 'so_luong'],
                        <?php
                        foreach ($data['thong_ke'] as $value) {

                            echo "['" . $value['tendm'] .
                                "', " . $value['so_luong'] .
                                "],";
                        } ?>
                    ]);

                    var options = {

                        title: 'Biểu đồ danh mục'
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }
            </script>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load("current", {
                    packages: ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ["Tháng", "Số lượng đơn hàng", {
                            role: "style"
                        }],
                        <?php
                        foreach ($data['dh_thang'] as $key => $value) {

                            echo "['" . $key . "', " . $value . ",'blue'],";
                        } ?>
                    ]);

                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                        {
                            calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation"
                        },
                        2
                    ]);

                    var options = {
                        title: "Thống kê đơn hàng theo tháng",

                        bar: {
                            groupWidth: "95%"
                        },
                        legend: {
                            position: "none"
                        },
                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                    chart.draw(view, options);
                }
            </script>