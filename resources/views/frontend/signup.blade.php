use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Signup page
    public function register()
    {
        return view('frontend.signup');
    }

    // Signup form submit
    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', // confirmed -> password_confirmation check karega
        ]);

        // Store in database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // always hash passwords
        ]);

        return redirect()->route('user.login')
                         ->with('success', 'Account created successfully');
    }
}
