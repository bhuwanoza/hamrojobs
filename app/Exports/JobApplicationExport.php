<?php

namespace App\Exports;

use App\Model\AppliedJobs;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;

class JobApplicationExport implements FromCollection, WithHeadings, WithEvents
{
	use Exportable;

	protected $job;

	public function __construct($job)
    {
        $this->job = $job;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $applied = AppliedJobs::where('job_id', $this->job->id)->get();
        $i = 1;
        foreach ($applied as $apply) {
        	if($apply->jobseeker->experiences) {
	        	foreach ($apply->jobseeker->experiences as $experience) {
	        		$experiences[] = $experience->job_title . ' (' . $experience->industry->title . '): ' . (isset($experience->start_date) ? $experience->start_date : '') . (isset($experience->end_date) ? ' to ' . $experience->end_date : '');
	        	}
	        }

            $columns[] = array(
                'S No' => $i,
                'Applicant Name' => $apply->jobseeker->user->first_name . ' ' . $apply->jobseeker->user->last_name,
                'Gender' => isset($apply->jobseeker->gender) ? $apply->jobseeker->gender : 'Others',
                'Email' => isset($apply->jobseeker->user->email) ? $apply->jobseeker->user->email : 'N/A',
                'Qualification' => isset($apply->jobseeker->academics) ? $apply->jobseeker->academics->pluck('academic_program')->implode(', ') : 'Not Found',
                'Expected Salary' => isset($apply->jobseeker->additional) ? $apply->jobseeker->additional->expected_salary_currency . ' ' . $apply->jobseeker->additional->expected_salary_boundary . ' ' . $apply->jobseeker->additional->expected_salary : 'Negotiable',
                'Experience' => isset($experiences) ? implode(', ', $experiences) : 'Not Found',
                'Application Date' => $apply->created_at->format('d/M/Y'),
                'Current Location' => $apply->jobseeker->current_address ? $apply->jobseeker->current_address : '',
                'Contact Number' => $apply->jobseeker->mobile ? $apply->jobseeker->mobile : ''
            );
            $i++;
        }

        return collect($columns);
    }

    public function headings(): array
    {
        return [
            'S No',
            'Applicant Name',
            'Gender', 
            'Email', 
            'Qualification',
            'Expected Salary',
            'Experience', 
            'Application Date', 
            'Current Location',
            'Contact Number'
        ];
    }

    public function registerEvents(): array
    {
    	$styleArray = [
    		'font' => [
    			'bold' => true
    		]
    	];

        return [
        	BeforeSheet::class => function(BeforeSheet $event) use ($styleArray) {
                $event->sheet->setCellValue('A1', 'Applications list on: ' . $this->job->title);
            },

            AfterSheet::class => function(AfterSheet $event) use ($styleArray) {
            	$event->sheet->insertNewRowBefore(2, 2);
                $event->sheet->getStyle('A1')->applyFromArray($styleArray);
                $event->sheet->getStyle('A4:J4')->applyFromArray($styleArray);
            }
        ];
    }
}
