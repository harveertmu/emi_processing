<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\LoanDetail;
use App\Models\EMIDetail;

class LoanDetailsController extends Controller
{
    public function index()
    {
        // Fetch all records from the loan_details table
        $loanDetails = DB::table('loan_details')->get();

        // Pass the data to the view
        return view('loan_details.index', ['loanDetails' => $loanDetails]);
    }

    public function createTable(Request $request)
    {
        try {
            // Drop the table if it already exists
            DB::statement('DROP TABLE IF EXISTS emi_details');

            // Get the min and max dates from loan_details
            $minDate = DB::table('loan_details')->min('first_payment_date');
            $maxDate = DB::table('loan_details')->max('last_payment_date');

            if (!$minDate || !$maxDate) {
                return response()->json(['message' => 'No payment dates found.'], 400);
            }

            $startDate = Carbon::parse($minDate);
            $endDate = Carbon::parse($maxDate);

            $columns = ['clientid INT NOT NULL'];
            while ($startDate->lte($endDate)) {
                $columns[] = $startDate->format('Y_m') . ' DECIMAL(10, 2)';
                $startDate->addMonth();
            }

            $columnsString = implode(', ', $columns);

            // Create the new table
            DB::statement("CREATE TABLE emi_details (
                id INT AUTO_INCREMENT PRIMARY KEY,
                $columnsString,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )");

            return response()->json(['message' => 'Table created successfully!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating table: ' . $e->getMessage()], 500);
        }
    }

    public function insert()
    {
        // Retrieve all loan details
        $loans = LoanDetail::all();

        foreach ($loans as $loan) {
            // Calculate EMI amount
            $emiAmount = $loan->loan_amount / $loan->num_of_payments;

            // Save each EMI amount into the corresponding months
            for ($i = 1; $i <= $loan->num_of_payments; $i++) {
                EMIDetail::create([
                    'loan_id' => $loan->id,
                    'payment_month' => $i,
                    'emi_amount' => $emiAmount,
                ]);
            }
        }

        $this->info('Loans processed and EMIs saved successfully.');
    }
}
