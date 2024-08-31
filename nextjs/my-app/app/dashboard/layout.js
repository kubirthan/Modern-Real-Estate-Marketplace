export default function dashboardlayout({children}) {
    return (
        <section>
            <nav></nav>
            <h1>Header</h1>
            {children}
            <h1>Footer</h1>
        </section>
    )
}