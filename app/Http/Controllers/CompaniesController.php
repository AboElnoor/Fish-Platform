<?php

namespace App\Http\Controllers;

use App\Models\ActivityType;
use App\Models\Company;
use App\Models\CompanyBank;
use App\Models\CompanyClntSplr;
use App\Models\CompanyMembership;
use App\Models\Governorate;
use App\Models\HSCode;
use App\Models\Locality;
use App\Models\Membership;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;

class CompaniesController extends Controller
{
    /**
     * FishCompanyType_ID
     * @var integer
     */
    private $FishCompanyType_ID = 1;

    /**
     * ActivityTypeGroup_ID
     * @var integer
     */
    private $ActivityTypeGroup_ID = 41;

    /**
     * CompanyType
     * @var array
     */
    private $CompanyType = [1];

    /**
     * Resource constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        switch (requestUri()) {
            case 'factories':
                $this->FishCompanyType_ID = 2;
                $this->ActivityTypeGroup_ID = 81;
                $this->CompanyType = [23];
                break;
            case 'sellers':
                $this->FishCompanyType_ID = 3;
                $this->ActivityTypeGroup_ID = 31;
                $this->CompanyType = [23, 3];
                break;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->forget('company');
        $companies = Company::where('FishCompanyType_ID', $this->FishCompanyType_ID)->latest()->paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::all()->pluck('Governorate_Name_A', 'Governorate_ID');
        $locals = Locality::all()->pluck('Locality_Name_A', 'Locality_ID');
        $villages = Village::all()->pluck('Village_Name_A', 'Village_ID');
        $types = ActivityType::where('ActivityTypeGroup_ID', $this->ActivityTypeGroup_ID)
            ->get()->pluck('AName', 'ActivityType_ID');
        $banks = CompanyBank::all()->pluck('Bank_Name_A', 'Bank_ID');
        $memberships = CompanyMembership::all()->pluck('MemberNameAr', 'Member_ID');
        $hscodes = HSCode::all()->pluck('HS_Aname', 'HSCode_ID');
        $clntsplrs = CompanyClntSplr::whereIn('CompanyType', $this->CompanyType)->get();

        $impClnts = new Collection;
        $clntsplrs = $clntsplrs->filter(function ($clntsplr) use (&$impClnts) {
            if (requestUri() == 'companies' && $clntsplr->Type_ID == $this->FishCompanyType_ID) {
                return true;
            }

            if (requestUri() != 'companies' && $clntsplr->Type_ID != $this->FishCompanyType_ID) {
                return true;
            }

            $impClnts->push($clntsplr);
        });

        $clntsplrs = $clntsplrs->pluck('ClntSplr_Name', 'ClntSplr_ID');
        $impClnts = $impClnts->pluck('ClntSplr_Name', 'ClntSplr_ID');
        $company = session('company', null);

        return view('companies.create', compact(
            'governorates',
            'locals',
            'villages',
            'types',
            'banks',
            'memberships',
            'hscodes',
            'clntsplrs',
            'impClnts',
            'company'
        ));
    }

    /**
     * Specify the form's rules.
     *
     * @return array
     */
    private function rules()
    {
        return [
            'FishCompanyName' => 'required|string',
            'TradeMark' => 'sometimes|nullable|string',
            'EYear' => 'sometimes|nullable|numeric',
            'EmpCount' => 'sometimes|nullable|numeric',
            'RegNo' => 'sometimes|nullable|numeric',
            'Activity' => 'sometimes|nullable|string',
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'FishCompanyType_ID' => $this->FishCompanyType_ID,
            'EntryUser' => auth()->id(),
            'UpdateUser' => auth()->id(),
        ];
        $data += $request->validate($this->rules());
        if (!empty(request('ActivityType_ID'))) {
            \Validator::make(request('ActivityType_ID'), [
                'ActivityType_ID.*' => [
                    'sometimes',
                    Rule::exists('activitytype')->where('ActivityTypeGroup_ID', $this->ActivityTypeGroup_ID),
                ],
            ]);
        }

        try {
            \DB::transaction(function () use ($data) {
                $company = Company::create($data);
                $company->activitytypes()->sync(request('ActivityType_ID'));
                session(compact('company'));
            });

            $success = 'تم انشاء مستلزمات الإنتاج بنجاح';
        } catch (\Exception $e) {
            \Log::error('storing ' . \Route::current()->getPrefix(), compact('e'));
            $error = 'حدث خطأ يرجى المحاولة مرة أخرى';
        }

        return back()->with(compact('success', 'error'));
    }

    /**
     * Specify the branch form's rules.
     *
     * @return array
     */
    private function branchRules()
    {
        return [
            'Governorate_ID' => 'required|exists:governorate',
            'Locality_ID' => 'required|exists:locality',
            'Village_ID' => request('Village_ID') ? 'required|exists:village' : '',
            'Address' => 'sometimes|nullable|string',
            'Mob' => 'sometimes|nullable|numeric',
            'Tel' => 'required|numeric',
            'Fax' => 'sometimes|nullable|numeric',
            'Email' => 'sometimes|nullable|string|email',
            'Web' => 'sometimes|nullable|string',
        ];
    }

    /**
     * Add branch information to company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function addBranch(Request $request, Company $company)
    {
        $data = $request->validate($this->branchRules());
        $company->branches()->create($data);

        session(compact('company'));
        $success = 'تم انشاء الفرع بنجاح';
        session()->flash('success', $success);
        return compact('success');
    }

    /**
     * Specify the manager form's rules.
     *
     * @return array
     */
    private function managerRules()
    {
        return [
            'EmpName' => 'required|string',
            'Job' => 'required|string',
            'Mob' => 'required|numeric',
            'Email' => 'sometimes|nullable|string|email',
        ];
    }

    /**
     * Add manager information to company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function addManager(Request $request, Company $company)
    {
        $data = $request->validate($this->managerRules());
        $company->managers()->create($data);

        session(compact('company'));
        $success = 'تم انشاء الموظف بنجاح';
        session()->flash('success', $success);
        return compact('success');
    }

    /**
     * Specify the bank form's rules.
     *
     * @return array
     */
    private function banksRules()
    {
        return [
            'Bank_ID.*' => 'required|exists:bank,Bank_ID',
        ];
    }

    /**
     * Add banks information to company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function addBanks(Request $request, Company $company)
    {
        $data = $request->validate($this->banksRules());
        $company->banks()->sync($data['Bank_ID']);

        session(compact('company'));
        $success = 'تم تحديد البنوك بنجاح';
        session()->flash('success', $success);
        return compact('success');
    }

    /**
     * Specify the membership form's rules.
     *
     * @return array
     */
    private function membershipRules()
    {
        return [
            'Member_ID.*' => 'required|exists:member,Member_ID',
        ];
    }

    /**
     * Add membership information to company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function addMembership(Request $request, Company $company)
    {
        $data = $request->validate($this->membershipRules());
        $company->memberships()->sync($data['Member_ID']);

        session(compact('company'));
        $success = 'تم تحديد العضويات بنجاح';
        session()->flash('success', $success);
        return compact('success');
    }

    /**
     * Specify the hSCodes form's rules.
     *
     * @return array
     */
    private function hSCodeRules()
    {
        return [
            'HSCode_ID.*' => 'required|exists:hscode,HSCode_ID',
            'ClntSplr_ID.*' => 'required|exists:clntsplr,ClntSplr_ID',
        ];
    }

    /**
     * Add hSCode information to company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function addHSCode(Request $request, Company $company)
    {
        $data = $request->validate($this->hSCodeRules());
        try {
            \DB::transaction(function () use ($company, $request) {
                $company->hSCodes()->sync($request->HSCode_ID);
                $company->clntSplrs()->sync($request->ClntSplr_ID);
                $this->update($request, $company);
            });
            $success = 'تم تحديد مجموعة الشركات بنجاح';
        } catch (\Exception $e) {
            \Log::error('addHSCode ' . \Route::current()->getPrefix(), compact('e'));
            $error = 'حدث خطأ يرجى المحاولة مرة أخرى';
        }

        session(compact('company'));
        isset($error) ? session()->flash('error', $error) : session()->flash('success', $success);
        return compact('success', 'error');
    }

    /**
     * Specify the Source form's rules.
     *
     * @return array
     */
    private function sourceRules()
    {
        return [
            'SourceS1' => 'sometimes|nullable|string',
            'Counts1' => 'sometimes|nullable|string',
            'SourceS2' => 'sometimes|nullable|string',
            'Counts2' => 'sometimes|nullable|string',
            'SourceS3' => 'sometimes|nullable|string',
            'Counts3' => 'sometimes|nullable|string',
            'SourceS4' => 'sometimes|nullable|string',
            'Counts4' => 'sometimes|nullable|string',
        ];
    }

    /**
     * Add Source information to Company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function addSource(Request $request, Company $company)
    {
        $data = $request->validate($this->sourceRules());
        $company->source()->updateOrCreate([], $data);
        session()->forget('company');

        $success = 'تم انشاء بيانات مستلزمات التشغيل بنجاح';
        return redirect()->route(requestUri() . '.index')->with(compact('success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $governorates = Governorate::all()->pluck('Governorate_Name_A', 'Governorate_ID');
        $locals = Locality::all()->pluck('Locality_Name_A', 'Locality_ID');
        $villages = Village::all()->pluck('Village_Name_A', 'Village_ID');
        $types = ActivityType::where('ActivityTypeGroup_ID', $this->ActivityTypeGroup_ID)
            ->get()->pluck('AName', 'ActivityType_ID');
        $banks = CompanyBank::all()->pluck('Bank_Name_A', 'Bank_ID');
        $memberships = CompanyMembership::all()->pluck('MemberNameAr', 'Member_ID');
        $hscodes = HSCode::all()->pluck('HS_Aname', 'HSCode_ID');
        $clntsplrs = CompanyClntSplr::whereIn('CompanyType', $this->CompanyType)->get();

        $impClnts = new Collection;
        $clntsplrs = $clntsplrs->filter(function ($clntsplr) use (&$impClnts) {
            if (requestUri() == 'companies' && $clntsplr->Type_ID == $this->FishCompanyType_ID) {
                return true;
            }

            if (requestUri() != 'companies' && $clntsplr->Type_ID != $this->FishCompanyType_ID) {
                return true;
            }

            $impClnts->push($clntsplr);
        });

        $clntsplrs = $clntsplrs->pluck('ClntSplr_Name', 'ClntSplr_ID');
        $impClnts = $impClnts->pluck('ClntSplr_Name', 'ClntSplr_ID');

        return view('companies.create', compact(
            'governorates',
            'locals',
            'villages',
            'types',
            'banks',
            'memberships',
            'hscodes',
            'clntsplrs',
            'impClnts',
            'company'
        ));
    }

    /**
     * Specify the update form's rules.
     *
     * @return array
     */
    private function updateRules()
    {
        return [
            'FishCompanyName' => 'sometimes|nullable|string',
            'TradeMark' => 'sometimes|nullable|string',
            'EYear' => 'sometimes|nullable|numeric',
            'EmpCount' => 'sometimes|nullable|numeric',
            'RegNo' => 'sometimes|nullable|numeric',
            'Activity' => 'sometimes|nullable|string',
            'ShareHoldr' => 'sometimes|nullable|string',
            'ShareHoldrFrgn' => 'sometimes|nullable|string',
            'ComGroup' => 'sometimes|nullable|string',
            'tradMarks' => 'sometimes|nullable|string',
            'WrkArea' => 'sometimes|nullable|string',
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $data = $request->validate($this->updateRules());

        if (!empty(request('ActivityType_ID'))) {
            \Validator::make(request('ActivityType_ID'), [
                'ActivityType_ID.*' => [
                    'sometimes',
                    Rule::exists('activitytype')->where('ActivityTypeGroup_ID', $this->ActivityTypeGroup_ID),
                ],
            ]);
        }

        try {
            \DB::transaction(function () use ($company, $data) {
                $company->update($data);
                $company->activitytypes()->sync(request('ActivityType_ID'));
            });

            $success = 'تم التعديل بنجاح';
        } catch (\Exception $e) {
            \Log::error('storing ' . \Route::current()->getPrefix(), compact('e'));
            $error = 'حدث خطأ يرجى المحاولة مرة أخرى';
        }

        session(compact('company'));
        return back()->with(compact('success', 'error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        session()->forget('company');
        $success = 'تم الحذف بنجاح';
        return back()->with(compact('success'));
    }
}
