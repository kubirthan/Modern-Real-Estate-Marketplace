

export async function GET(req){
    const type = req.nextUrl.searchParams.get('type')
    console.log('type:', type);
    
    return  Response.json({title: "success"})
}

export async function POST(req) {
   const body = await req.json()
   console.log(body);
   
    return Response.json({message: "POST success"})
}