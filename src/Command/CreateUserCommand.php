<?php

    namespace App\Command;

    use Symfony\Component\Console\Attribute\AsCommand;
    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;
    use App\Entity\User;
    use App\Repository\UserRepository;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Input\InputOption;
    use Symfony\Component\Console\Style\SymfonyStyle;
    use Symfony\Component\Console\Question\Question;

    #[AsCommand(
        name: 'app:create-user', 
        description: 'create User Command',
    )]
    class CreateUserCommand extends Command
    {
        public function __construct(private UserRepository $userRepository)
        {
            parent::__construct();
        }

        protected function execute(InputInterface $input, OutputInterface $output): int
        {
            $output = new SymfonyStyle($input, $output);

            $output->writeln([
                'User Creator',
                '============',
                '',
            ]);

            $username = $output->ask('Username:');
            $password = $output->ask('Password:');

            $user = new User();
            $user->setUsername($username);
            $user->setPassword($password);

            $this->userRepository->insert($user);
            $output->writeln('Done!');
            $output->success('Created a user: ' . $username . ' with password: ' . $password);
            return Command::SUCCESS;
        }
    }
