export default function Page({params}) {
    return <div>my post: {params.slug[0]} / {params.slug[1]} / {params.slug[2]}</div>
}