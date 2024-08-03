import React from 'react'


const PaymentBanking = () => {
    return (
        <>
            <div className="flex flex-col items-center justify-center min-h-screen bg-green dark:bg-green">
                <div className="max-w-xl w-full space-y-6 p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div className="flex flex-col items-center">
                        <CircleCheckIcon className="text-green-500 h-16 w-16" />
                        <h1 className="text-3xl font-bold text-gray-900 dark:text-gray-700 mt-4"></h1>
                        <p className="text-gray-700 dark:text-gray-400 mt-2">
                        </p>
                    </div>
                    <div className="border-t border-gray-200 dark:border-gray-700 pt-6 space-y-4">
                        <div className="flex justify-between">
                            <span className="text-black dark:text-gray-400">Số tài khoản:</span>
                            <span className="font-medium text-black dark:text-gray-50 ">231231312313</span>
                        </div>
                        <div className="flex justify-between">
                            <span className="text-black dark:text-gray-400">Tên Chủ tài khoản</span>
                            <span className="font-medium text-black dark:text-gray-50">Nguyễn Mạnh Cường</span>
                        </div>
                        <div className="flex justify-between">
                            <span className="text-black dark:text-gray-400">Ngân Hàng:</span>
                            <span className="font-medium text-black dark:text-gray-50">Ngân hàng TMCP Đầu tư và Phát triển Việt Nam (BIDV)</span>
                        </div>
                        <div className="flex justify-between">
                            <span className="text-black dark:text-gray-400">Giá:</span>
                            <span className="font-medium text-black dark:text-gray-50"> 6.000.000 Đồng</span>
                        </div>
                        <div className="flex justify-between">
                            <span className="text-black dark:text-gray-400">Nội dung tài khoản:</span>
                            <span className="font-medium text-black dark:text-gray-50">Chuyển khoản vé du lịch DEAH</span>
                        </div>
                        <div className="flex justify-between">
                            <span className="text-black dark:text-gray-400">Mã hoá đơn:</span>
                            <span className="font-medium text-black dark:text-gray-50"></span>
                        </div>
                    </div>
                    <div className="flex justify-around">
                        <a
                            className="btn btn-primary" href='/index-two'
                        >
                            Quay lại trang chủ
                        </a>
                        <a
                            className="btn btn-warning"
                        >
                            Xuất hoá đơn
                        </a>
                    </div>
                </div>
            </div>
        </>
    )
}
function CircleCheckIcon(props: JSX.IntrinsicAttributes & React.SVGProps<SVGSVGElement>) {
    return (
        <svg
            {...props}
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            strokeWidth="2"
            strokeLinecap="round"
            strokeLinejoin="round"
        >
            <circle cx="12" cy="12" r="10" />
            <path d="m9 12 2 2 4-4" />
        </svg>
    )
}

const ErrorIcon = () => (
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        width="40"
        height="40"
        fill="red"

    >

        <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 18c-.828 0-1.5-.672-1.5-1.5S11.172 15 12 15s1.5.672 1.5 1.5S12.828 18 12 18zm1-4h-2V7h2v7z" />
    </svg>
);
export default PaymentBanking