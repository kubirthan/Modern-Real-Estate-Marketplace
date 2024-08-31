"use client"
import Image from "next/image";
import { useRouter } from "next/navigation";

export default function Dashboard() {
  const router = useRouter()

  const back = () => {
    router.push('/')
  }

  return (
    <main className="flex min-h-screen flex-col items-center justify-between p-24">
      <h1>dashboard page</h1>
      <button onClick={back} className="bg-blue-600">back</button>
    </main>
  );
}
