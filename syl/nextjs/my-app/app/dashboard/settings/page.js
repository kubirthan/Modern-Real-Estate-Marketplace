"use client"
import Image from "next/image";
import { useRouter } from "next/navigation";

export default function Settings() {
    const router = useRouter()

    const back = () => {
        router.push('/dashboard')
    }

  return (
    <main className="flex min-h-screen flex-col items-center justify-between p-24">
      <h1>setting page</h1>
      <button onClick={back} className="bg-blue-600">back</button>
    </main>
  );
}
