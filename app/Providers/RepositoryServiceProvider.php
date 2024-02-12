<?php

namespace App\Providers;

use App\Interface\AttendanceRepositoryInterface;
use App\Interface\BillOfExchangeRepositoryInterface;
use App\Interface\ExamRepositoryInterface;
use App\Interface\FeeInvoiceRepositoryInterface;
use App\Interface\FeeRepositoryInterface;
use App\Interface\GardianRepositoryInterface;
use App\Interface\GraduatedRepositoryInterface;
use App\Interface\ExcludeFeeRepositoryInterface;
use App\Interface\LibraryRepositoryInterface;
use App\Interface\OnlineClassRepositoryInterface;
use App\Interface\PromotionRepositoryInterface;
use App\Interface\QuestionRepositoryInterface;
use App\Interface\QuizRepositoryInterface;
use App\Interface\StudentReceiptRepositoryInterface;
use App\Interface\StudentRepositoryInterface;
use App\Interface\SubjectRepositoryInterface;
use App\Interface\TeacherRepositoryInterface;
use App\Repository\AttendanceRepository;
use App\Repository\BillOfExchangeRepository;
use App\Repository\ExamRepository;
use App\Repository\FeeInvoiceRepository;
use App\Repository\FeeRepository;
use App\Repository\GardianRepository;
use App\Repository\GraduatedRepository;
use App\Repository\ExcludeFeeRepository;
use App\Repository\LibraryRepository;
use App\Repository\OnlineClassRepository;
use App\Repository\PromotionRepository;
use App\Repository\QuestionRepository;
use App\Repository\QuizRepository;
use App\Repository\StudentReceiptRepository;
use App\Repository\StudentRepository;
use App\Repository\SubjectRepository;
use App\Repository\TeacherRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider{

    public function register(): void{
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(GardianRepositoryInterface::class, GardianRepository::class);
        $this->app->bind(PromotionRepositoryInterface::class, PromotionRepository::class);
        $this->app->bind(GraduatedRepositoryInterface::class, GraduatedRepository::class);
        $this->app->bind(FeeRepositoryInterface::class, FeeRepository::class);
        $this->app->bind(FeeInvoiceRepositoryInterface::class, FeeInvoiceRepository::class);
        $this->app->bind(StudentReceiptRepositoryInterface::class, StudentReceiptRepository::class);
        $this->app->bind(ExcludeFeeRepositoryInterface::class, ExcludeFeeRepository::class);
        $this->app->bind(BillOfExchangeRepositoryInterface::class, BillOfExchangeRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class, AttendanceRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this->app->bind(ExamRepositoryInterface::class, ExamRepository::class);
        $this->app->bind(QuizRepositoryInterface::class, QuizRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(OnlineClassRepositoryInterface::class, OnlineClassRepository::class);
        $this->app->bind(LibraryRepositoryInterface::class, LibraryRepository::class);
    }

    public function boot(): void{
        //
    }
}