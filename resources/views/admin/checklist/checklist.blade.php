@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )



@section('content')

    <style>
        body {
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #335b74;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        ul li {
            margin-bottom: 10px;
        }
    </style>
    <div class="content-wrapper">

        <section class="content-header">

            <div class="container mt-4">
                <h1 class="mb-4">Service Verification</h1>
<p>This will be the preliminary master list of all checklists per area and responsibility.</p>
                <!-- HVAC Section -->
                <h2 class=" border-top border-5 border-success">Heating, Ventilation, and Air Conditioning Check</h2>
                <ul>
                    <li><input type="checkbox"> Replace filters – Per system specifications.</li>
                    <li><input type="checkbox"> Clean and check flue system - Monthly</li>
                    <li><input type="checkbox"> Inspect electrical connections for frays each visit.</li>
                    <li><input type="checkbox"> Inspect belts each visit.</li>
                    <li><input type="checkbox"> Check drains for blockages each visit.</li>
                    <li><input type="checkbox"> Test thermostats each visit.</li>
                    <li><input type="checkbox"> Clean fan/blower blades each visit.</li>
                    <li><input type="checkbox"> Check refrigerant for leaks each visit.</li>
                    <li><input type="checkbox"> Ensure correct lubrication of all moving parts each visit.</li>
                    <li><input type="checkbox"> Inspect exterior equipment for any obstructions or debris that may compromise the unit on each visit.</li>
                </ul>

                <!-- Electrical Section -->
                <h2 class=" border-top border-4 border-success">Electrical Component Verification</h2>
                <ul>
                    <li><input type="checkbox"> Visually inspect circuit breakers for any abnormalities</li>
                    <li><input type="checkbox"> Test all light switches to ensure proper function</li>
                    <li><input type="checkbox"> Ensure switches are secure within box</li>
                    <li><input type="checkbox"> Test all outlets with power and grounding meter</li>
                    <li><input type="checkbox"> Ensure outlets are secure within box</li>
                    <li><input type="checkbox"> Verify and identify any lights that are out</li>
                    <li><input type="checkbox"> Ensure no cracks in any outlet or switch covers</li>
                </ul>

                <!-- Plumbing Section -->
                <h2 class=" border-top border-4 border-success">Plumbing Fixture Inspection</h2>
                <ul>
                    <li><input type="checkbox"> Inspect all faucets for proper operation</li>
                    <li><input type="checkbox"> Inspect all toilets for proper operation</li>
                    <li><input type="checkbox"> Inspect all drains for visible leaks</li>
                    <li><input type="checkbox"> Inspect hot water tank(s) for leaks and proper operation</li>
                    <li><input type="checkbox"> Test all shut off valve(s) for proper operation</li>
                    <li><input type="checkbox"> Inspect all vent pipes for blockages</li>
                    <li><input type="checkbox"> Inspect all sump pumps for proper operation</li>
                    <li><input type="checkbox"> Inspect backflow devices for any leaks</li>
                </ul>

                <!-- Additional Tasks Section -->
                <h2 class=" border-top border-4 border-success">Additional Responsibilities
                </h2>
                <ul>
                    <li><input type="checkbox"> During working hours, assist with any building emergency requests.</li>
                    <li><input type="checkbox"> Perform any miscellaneous items requested by One Global Management or Clean Force Management Team. (Agreed & approved between One Global and Clean Force Management Teams)</li>
                </ul>
            </div>
        </section>
    </div>



@endsection
