<?php
    $page = array(
        'title' => 'Booking module',
        'formBooking' => 1,
    );
?>
    <div id="calendar-page" class="container-fluid">
        <div id="calendar-toolbar">
            <div id="calendar-filter" class="form-inline col-xs-12 col-sm-5">
                <div class="form-group">
                    <label for="select-filter-item">Display Calendar</label>
                    <select id="select-filter-item" class="form-control" title="Select a provider or a service and view the appointments on the calendar.">
                    </select>
                </div>
            </div>

            <div id="calendar-actions" class="col-xs-12 col-sm-7">
                <?php if (($role_slug == DB_SLUG_ADMIN || $role_slug == DB_SLUG_PROVIDER)
                        && Config::GOOGLE_SYNC_FEATURE == true): ?>
                    <button id="google-sync" class="btn btn-primary"">
                        <span class="glyphicon glyphicon-refresh"></span>
                    </button>

                    <button id="enable-sync" class="btn btn-default" data-toggle="button">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </button>
                <?php endif ?>

                <?php if ($privileges[PRIV_APPOINTMENTS]['add'] == true): ?>
                    <button id="insert-appointment" class="btn btn-default">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>

                    <button id="insert-unavailable" class="btn btn-default">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                <?php endif ?>

                <button id="reload-appointments" class="btn btn-default">
                    <span class="glyphicon glyphicon-repeat"></span>
                </button>

                <button id="toggle-fullscreen" class="btn btn-default">
                    <span class="glyphicon glyphicon-fullscreen"></span>
                </button>
            </div>
        </div>

        <div id="calendar"><!-- Dynamically Generated Content --></div>
    </div>

    <!-- MANAGE APPOINTMENT MODAL -->

    <div id="manage-appointment" class="modal fade" data-keyboard="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">Edit Appointment</h3>
                </div>

                <div class="modal-body">
                    <div class="modal-message alert hidden"></div>

                    <form>
                        <fieldset>
                            <legend>Appointment Details</legend>

                            <input id="appointment-id" type="hidden">

                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="select-service" class="control-label">Service *</label>
                                        <select id="select-service" class="required form-control">
                                            <?php
                                            // Group services by category, only if there is at least one service
                                            // with a parent category.
                                            $has_category = false;
                                            foreach ($available_services as $service) {
                                                if ($service['category_id'] != null) {
                                                    $has_category = true;
                                                    break;
                                                }
                                            }

                                            if ($has_category) {
                                                $grouped_services = array();

                                                foreach ($available_services as $service) {
                                                    if ($service['category_id'] != null) {
                                                        if (!isset($grouped_services[$service['category_name']])) {
                                                            $grouped_services[$service['category_name']] = array();
                                                        }

                                                        $grouped_services[$service['category_name']][] = $service;
                                                    }
                                                }

                                                // We need the uncategorized services at the end of the list so
                                                // we will use another iteration only for the uncategorized services.
                                                $grouped_services['uncategorized'] = array();
                                                foreach ($available_services as $service) {
                                                    if ($service['category_id'] == null) {
                                                        $grouped_services['uncategorized'][] = $service;
                                                    }
                                                }

                                                foreach ($grouped_services as $key => $group) {
                                                    $group_label = ($key != 'uncategorized')
                                                        ? $group[0]['category_name'] : 'Uncategorized';

                                                    if (count($group) > 0) {
                                                        echo '<optgroup label="' . $group_label . '">';
                                                        foreach ($group as $service) {
                                                            echo '<option value="' . $service['id'] . '">'
                                                                . $service['name'] . '</option>';
                                                        }
                                                        echo '</optgroup>';
                                                    }
                                                }
                                            } else {
                                                foreach ($available_services as $service) {
                                                    echo '<option value="' . $service['id'] . '">'
                                                        . $service['name'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="select-provider" class="control-label">Provider *</label>
                                        <select id="select-provider" class="required form-control"></select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="start-datetime" class="control-label">Start Date / Time</label>
                                        <input id="start-datetime" class="required form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="end-datetime" class="control-label">End Date / Time</label>
                                        <input id="end-datetime" class="required form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="appointment-notes" class="control-label">Notes</label>
                                        <textarea id="appointment-notes" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <br>

                        <fieldset>
                            <legend>
                                Customer Details
                                <button id="new-customer" class="btn btn-default btn-xs"
                                        type="button">New
                                </button>
                                <button id="select-customer" class="btn btn-primary btn-xs"
                                        type="button">Select
                                </button>
                                <input id="filter-existing-customers"
                                       placeholder="Filter Customers"
                                       style="display: none;" class="input-sm form-control">
                                <div id="existing-customers-list" style="display: none;"></div>
                            </legend>

                            <input id="customer-id" type="hidden">

                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="first-name" class="control-label">First Name *</label>
                                        <input id="first-name" class="required form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="last-name" class="control-label">Last Name *</label>
                                        <input id="last-name" class="required form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="control-label">Email *</label>
                                        <input id="email" class="required form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone-number" class="control-label">Phone Number *</label>
                                        <input id="phone-number" class="required form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="address" class="control-label">Address</label>
                                        <input id="address" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="city" class="control-label">City</label>
                                        <input id="city" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="zip-code" class="control-label">Zip Code</label>
                                        <input id="zip-code" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="customer-notes" class="control-label">Notes</label>
                                        <textarea id="customer-notes" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>

                <div class="modal-footer">
                    <button id="save-appointment" class="btn btn-primary">Save</button>
                    <button id="cancel-appointment" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MANAGE UNAVAILABLE MODAL -->

    <div id="manage-unavailable" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">New Unavailable Period</h3>
                </div>
                <div class="modal-body">
                    <div class="modal-message alert hidden"></div>

                    <form>
                        <fieldset>
                            <input id="unavailable-id" type="hidden">

                            <div class="form-group">
                                <label for="unavailable-provider" class="control-label">Provider</label>
                                <select id="unavailable-provider" class="form-control"></select>
                            </div>

                            <div class="form-group">
                                <label for="unavailable-start" class="control-label">Start</label>
                                <input id="unavailable-start" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="unavailable-end" class="control-label">End</label>
                                <input id="unavailable-end" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="unavailable-notes" class="control-label">Notes</label>
                                <textarea id="unavailable-notes" rows="3" class="form-control"></textarea>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="save-unavailable" class="btn btn-primary">Save</button>
                    <button id="cancel-unavailable" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SELECT GOOGLE CALENDAR MODAL -->

    <div id="select-google-calendar" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">Select Google Calendar</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="google-calendar" class="control-label">Select the calendar that you want to sync your appointments. If you do not want to select a specific calendar the default one will be used.</label>
                        <select id="google-calendar" class="form-control"></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="select-calendar" class="btn btn-primary">Select</button>
                    <button id="close-calendar" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
