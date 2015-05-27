<form action="admin/homepage/sidenav" method="POST">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td class="col-md-4">Tampilkan Side Navigation</td>
                <td colspan="2">
                    <select name="slc_sidenav" class="form-control">
                        <option value="Y" {{($homepage['show_sidenav']['value']=='Y'?'selected':'')}}>Tampilkan</option>
                        <option value="N" {{($homepage['show_sidenav']['value']=='N'?'selected':'')}}>Sembunyikan</option>
                    </select>
                </td>
            </tr>
            <tr class="tr-sidenav-setting" >
                <td><label>Setting Side Navigation</label></td>
                <td colspan="2"></td>
            </tr>
            <tr class="tr-sidenav-setting" >
                <td rowspan="3">Find Destination</td>
                <td>
                    Icon
                </td>
                <td>
                    <img src="frontend/img/icon/find-dest.png" />
                </td>
            </tr>
            <tr class="tr-sidenav-setting" >
                <td>
                    Title
                </td>
                <td>
                    <input value="{{$homepage['sidenav_find_destination']['value']}}" type="text" name="tx_find_dest" class="form-control"/>
                </td>
            </tr>
            <tr class="tr-sidenav-setting" >
                <td>
                    Subtitle
                </td>
                <td>
                    <input value="{{$homepage['sidenav_find_destination_subtitle']['value']}}" type="text" name="tx_find_dest_sbt" class="form-control"/>
                </td>
            </tr>
            <tr class="tr-sidenav-setting" >
                <td rowspan="3">Read News</td>
                <td>
                    Icon
                </td>
                <td>
                    <img src="frontend/img/icon/news.png" />
                </td>
            </tr>
            <tr class="tr-sidenav-setting" >
                <td>
                    Title
                </td>
                <td>
                    <input value="{{$homepage['sidenav_read_news']['value']}}"type="text" name="tx_read_news" class="form-control"/>
                </td>
            </tr>
            <tr class="tr-sidenav-setting" >
                <td>
                    Subtitle
                </td>
                <td>
                    <input value="{{$homepage['sidenav_read_news_subtitle']['value']}}"type="text" name="tx_read_news_sbt" class="form-control"/>
                </td>
            </tr>
            <tr class="tr-sidenav-setting" >
                <td rowspan="3">Buy Travel Guide</td>
                <td>
                    Icon
                </td>
                <td>
                    <img src="frontend/img/icon/ticket.png" />
                </td>
            </tr>
            <tr class="tr-sidenav-setting" >
                <td>
                    Title
                </td>
                <td>
                    <input value="{{$homepage['sidenav_buy_travel']['value']}}"type="text" name="tx_buy_ticket" class="form-control"/>
                </td>
            </tr>
            <tr class="tr-sidenav-setting" >
                <td>
                    Subtitle
                </td>
                <td>
                    <input value="{{$homepage['sidenav_buy_travel_subtitle']['value']}}"type="text" name="tx_buy_ticket_sbt" class="form-control"/>
                </td>
            </tr>
            <tr class="tr-sidenav-setting" >
                <td rowspan="3">What They Say</td>
                <td>
                    Icon
                </td>
                <td>
                    <img src="frontend/img/icon/what-they-say.png" />
                </td>
            </tr>
            <tr class="tr-sidenav-setting" >
                <td>
                    Title
                </td>
                <td>
                    <input value="{{$homepage['sidenav_wts']['value']}}"type="text" name="tx_wts" class="form-control"/>
                </td>
            </tr>
            <tr class="tr-sidenav-setting" >
                <td>
                    Subtitle
                </td>
                <td>
                    <input value="{{$homepage['sidenav_wts_subtitle']['value']}}"type="text" name="tx_wts_sbt" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="text-right" colspan="2">
                    <a id="btn-save-2" class="btn btn-primary">Save</a>
                </td>
            </tr>
        </tbody>
    </table>
</form>