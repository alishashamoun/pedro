@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )





@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container mt-4">
                <h1 class="text-center">Inspection Sheet</h1>

                <!-- Shared Spaces
                         Table -->
                <h2>Shared Spaces
                </h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Check</th>
                            <th>Shared Spaces
                            </th>
                            <th>G</th>
                            <th>Y</th>
                            <th>R</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Pull trash, change liner, clean & wipe receptacle</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Dust & damp mop all hard floors surfaces</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Vacuum all carpeted areas including walk-off mats</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Clean all entry glass doors, frames & handles</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Dust & wipe clean all furniture, fixtures, ledges & railings</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Dusting of all horizontal surfaces</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <!-- Add more rows for Shared Spaces
                         here -->
                    </tbody>
                </table>

                <!-- Lifts Table -->
                <h2>Lifts</h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Check</th>
                            <th>Lifts</th>
                            <th>G</th>
                            <th>Y</th>
                            <th>R</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Vacuum carpets, sweep & mop any hard floors</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Wipe clean interior & exterior doors including walls</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Clean & polish stainless steel</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Clean and polish elevator tracks and thresholds</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <!-- Add more rows for Lifts here -->
                    </tbody>
                </table>
                <!-- Lavatories Table -->
                <h2>Lavatories</h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Check</th>
                            <th>Lavatories</th>
                            <th>G</th>
                            <th>Y</th>
                            <th>R</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>
                                Pull trash and replace liners </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Restock all Lavatories consumables</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Sweep and damp mop all tile floors</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Clean mirrors and all bright work (faucets, flushers, piping)</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Clean/disinfect all toilets, basins & urinals</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Clean/disinfect all vanity & countertops</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Spot clean walls and partitions</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Wipe clean all tile walls, partitions, hinges, etc. </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Clean all fixtures to remove salt & lime build-up</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Dust all horizontal surfaces including air vents (sills, frames, shelving, etc.)</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <!-- Add more rows for Lifts here -->
                    </tbody>
                </table>
                <!-- Exterior of Building
                     Table -->
                <h2>Exterior of Building
                </h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Check</th>
                            <th>Exterior of Building
                            </th>
                            <th>G</th>
                            <th>Y</th>
                            <th>R</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>
                                Empty trash and replace liners </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Remove any debris around building</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Remove cobwebs from all main doors</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>


                    </tbody>
                </table>
                <!-- Shared Spaces
                        /Hallways Table -->
                <h2>Shared Spaces
                    /Hallways</h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Check</th>
                            <th>Shared Spaces
                                /Hallways</th>
                            <th>G</th>
                            <th>Y</th>
                            <th>R</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>
                                Pull trash, change liner, clean & wipe receptacle </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Dust & damp mop all hard floors surfaces</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Vacuum all carpeted areas including walk-off mats</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Clean all entry glass doors, frames & handles</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Dust & wipe clean all furniture, fixtures, ledges & railings</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Dusting of all horizontal surfaces</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>


                    </tbody>
                </table>
                <!-- Stair Areas
                 Table -->
                <h2>Stair Areas
                </h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Check</th>
                            <th>Stair Areas
                            </th>
                            <th>G</th>
                            <th>Y</th>
                            <th>R</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>
                                Sweep & mop(if hard floors) landings to remove dust & dirt </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Handrails to be damp wiped & cleaned</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>High dusting of ceilings, standpipes for cobwebs, dust, etc.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Vacuum carpeted Stair Areas
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
                <!-- Cleaning Closets
             Table -->
                <h2>Cleaning Closets
                </h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Check</th>
                            <th>Cleaning Closets
                            </th>
                            <th>G</th>
                            <th>Y</th>
                            <th>R</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Leave area clean, organized, no trash in containers</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Sweep & mop floors</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Clean janitor sinks</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Inspect vacuum, rags, CMS unit, etc.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
                <!-- Kitchen Spaces
        s Table -->
                <h2>Kitchen Spaces
                    s</h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Check</th>
                            <th>Kitchen Spaces
                                s</th>
                            <th>G</th>
                            <th>Y</th>
                            <th>R</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Empty trash & replace liners </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Floors to be dust mopped & wet mopped</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Wipe down tables and chairs, and repositioned </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Clean/wipe all walls and countertops from spills and fingerprints </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Clean & polish stainless steel sink</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Clean outside of microwaves & refrigerators</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Dust all horizontal surfaces</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Dust all ceiling air vents</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>


                    </tbody>
                </table>
                <!-- Workspace Types
     Table -->
                <h2>Workspace Types
                </h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Check</th>
                            <th>Workspace Types
                            </th>
                            <th>G</th>
                            <th>Y</th>
                            <th>R</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Empty trash and replace liners</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Sweep/mop floors</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Wipe clean, disinfect all tables tops, counters, etc.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Dust all horizontal surfaces, ledges, pictures frames, etc.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Dust all ceiling air vents</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Wipe/clean wall switches, door handles, etc.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Touch-up partition glass for fingerprints, etc.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>


                    </tbody>
                </table>
                <div class="row my-4">
                    <div class="mx-auto text-center">

                        <span class="text-success mx-2">G (Green)-Excellent conditions</span>
                        <span class="text-warning mx-2">Y (Yellow)-Need some attention </span>
                        <span class="text-danger mx-2">R (Red)-Need immediate attention</span>
                    </div>
                </div>

                <!-- Additional Comments -->
                <div class="form-group">
                    <label for="additional-comments">Additional comments or concerns:</label>
                    <textarea class="form-control" id="additional-comments" rows="5"></textarea>
                </div>

                <!-- Floor Work/Carpet Cleaning Needed -->
                <div class="form-group">
                    <label for="floor-work">Floor work/Carpet cleaning needed:</label>
                    <textarea class="form-control" id="floor-work" rows="3"></textarea>
                </div>

                <!-- Date and Signatures -->
                <div class="row">
                    <div class="col-md-4">
                        <label for="date">Date:</label> <span>--------</span>
                        {{-- <input type="text" class="form-control" id="date"> --}}
                    </div>
                    <div class="col-md-4">
                        <label for="supervisor-signature">Supervisor signature:</label> <span>--------</span>
                        {{-- <input type="text" class="form-control" id="supervisor-signature"> --}}

                    </div>
                    <div class="col-md-4">
                        <label for="cleaner-signature">Cleaner signature:</label> <span>--------</span>
                        {{-- <input type="text" class="form-control" id="cleaner-signature"> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
