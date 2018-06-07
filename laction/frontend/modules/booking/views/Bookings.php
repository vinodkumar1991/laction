<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<div class="container" style="margin-top:20px;">
    <h2 class="title" style="margin-bottom:40px;">Bookings</h2>
    <table id="bookings" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Booking No</th>
                <th>Category</th>
                <th>Event Date</th>
                <th>From Time</th>
                <th>To Time</th>
                <th>Booking Status</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($bookings)) {
                foreach ($bookings as $arrBooking) {
                    ?>

                    <tr>
                        <td><?php echo $arrBooking['booking_no']; ?></td>
                        <td><?php echo $arrBooking['category_type']; ?></td>
                        <td><?php echo $arrBooking['booked_date']; ?></td>
                        <td><?php echo $arrBooking['slot_start_time']; ?></td>
                        <td><?php echo $arrBooking['slot_end_time']; ?></td>
                        <td><?php echo $arrBooking['booking_status']; ?></td>
                        <td><?php echo $arrBooking['total_amount']; ?></td>
                    </tr>

                    <?php
                }
            }
            unset($bookings);
            ?>


        </tbody>
    </table>
</div>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#bookings').DataTable();
    });
</script>