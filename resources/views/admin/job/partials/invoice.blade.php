                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="table-header-flex">
                                            <i class="fa fa-exclamation-circle"
                                                style="position: absolute;top: 0;left: 0;padding: 3px;"></i>
                                            <button class="btn btn-md group-button">Group</button>
                                        </th>
                                        <th class="table-header-flex"><span>Description</span> <i
                                                class="fa fa-exclamation-circle"style="position: absolute;top: 0;left: 0;padding: 30px 95px;"></i>
                                        </th>
                                        <th>Warehouse</th>
                                        <th>Qty/Hrs</th>
                                        <th>Rate</th>
                                        <th>Total</th>
                                        <th>Cost</th>
                                        <th>Margin Tax</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="job-invoice-rows">

                                    @if (@isset($invoice->service))
                                        @foreach ($invoice->service as $y => $service)
                                            <tr>
                                                <td colspan="2"><input
                                                        value="{{ isset($service->description) ? $service->description : '' }}"
                                                        type="text" class="form-control inv_desc"
                                                        name="description[]" placeholder="Description"></td>
                                                <td><input
                                                        value="{{ isset($service->warehouse) ? $service->warehouse : '' }}"
                                                        type="text" class="form-control job_inv_whr"
                                                        name="warehouse[]" placeholder="Warehouse"></td>
                                                <td><input
                                                        value="{{ isset($service->qty_hrs) ? $service->qty_hrs : '' }}"
                                                        type="number" class="form-control job_inv_qty" name="qty_hrs[]"
                                                        placeholder="Qty"></td>
                                                <td><input value="{{ isset($service->rate) ? $service->rate : '' }}"
                                                        type="number" class="form-control job_inv_rate" name="rate[]"
                                                        placeholder="Rate"></td>
                                                <td><input value="{{ isset($service->total) ? $service->total : '' }}"
                                                        type="number" class="form-control job_inv_total" name="total[]"
                                                        placeholder="Total" readonly></td>
                                                <td><input value="{{ isset($service->cost) ? $service->cost : '' }}"
                                                        type="number" class="form-control job_inv_cost" name="cost[]"
                                                        placeholder="Cost"></td>
                                                <td><input
                                                        value="{{ isset($service->margin_tax) ? $service->margin_tax : '' }}"
                                                        type="number" class="form-control job_inv_tax"
                                                        name="margin_tax[]" placeholder="Tax"></td>
                                                <td class="d-flex">
                                                    @if (!$loop->first)
                                                        <a href="{{ route('productService.destroy', $service->id) }}"
                                                            class="btn calculate-button" data-row="1"><i
                                                                class="fas fa-trash text-danger"></i></a>
                                                    @endif
                                                    @if ($loop->last)
                                                        <button type="button" class="btn calculate-button"
                                                            id="job-multiple-primary" data-row="1"><i
                                                                class="fas fa-plus text-primary"></i></button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2"><input type="text" class="form-control inv_desc"
                                                    name="description[]" placeholder="Description"></td>
                                            <td><input type="text" class="form-control job_inv_whr"
                                                    name="warehouse[]" placeholder="Warehouse"></td>
                                            <td><input type="number" class="form-control job_inv_qty" name="qty_hrs[]"
                                                    placeholder="Qty"></td>
                                            <td><input type="number" class="form-control job_inv_rate" name="rate[]"
                                                    placeholder="Rate"></td>
                                            <td><input type="number" class="form-control job_inv_total" name="total[]"
                                                    placeholder="Total" readonly></td>
                                            <td><input type="number" class="form-control job_inv_cost" name="cost[]"
                                                    placeholder="Cost"></td>
                                            <td><input type="number" class="form-control job_inv_tax"
                                                    name="margin_tax[]" placeholder="Tax"></td>
                                            <td><button type="button" class="btn calculate-button"
                                                    id="job-multiple-primary" data-row="1"><i
                                                        class="fas fa-plus text-primary"></i></button></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
