<!DOCTYPE html>
<html>
    @include('report_template.excel.style')

    <table>
        <tr class="title-row">
            <td colspan="7">
                <b>@lang('report.template.truck.report_name')</b>
            </td>
        </tr>
        <tr>
            <td colspan="7">&nbsp;</td>
        </tr>
        @if($showParameter)
            @if(!empty($plateNumber))
                <tr>
                    <td colspan="7">
                        @lang('report.template.truck.parameter.plate_number') {{ ': ' . $plateNumber }}
                    </td>
                </tr>
            @endif
        @endif
        <tr>
            <td colspan="7">&nbsp;</td>
        </tr>
        <tr class="header-row">
            <th>@lang('report.template.truck.header.store')</th>
            <th>@lang('report.template.truck.header.truck_type')</th>
            <th>@lang('report.template.truck.header.plate_number')</th>
            <th>@lang('report.template.truck.header.inspection_date')</th>
            <th>@lang('report.template.truck.header.driver')</th>
            <th>@lang('report.template.truck.header.status')</th>
            <th>@lang('report.template.truck.header.remarks')</th>
        </tr>
        @foreach($trucks as $key => $truck)
            <tr class="data-row">
                <td>{{ $truck->store->name }}</td>
                <td>{{ $truckTypeDDL[$truck->type] }}</td>
                <td>{{ $truck->plate_number }}</td>
                <td>{{ $truck->inspection_date }}</td>
                <td>{{ $truck->driver }}</td>
                <td>{{ $statusDDL[$truck->status] }}</td>
                <td>{{ $truck->remarks }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="7">&nbsp;</td>
        </tr>
        <tr class="footer-row">
            <td colspan="7">
                @lang('report.template.truck.footer', ['user' => $currentUser, 'date' => $reportDate])
            </td>
        </tr>
    </table>
</html>